<?php defined('BASEPATH') or exit('No direct script access allowed');
/**

 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Chris Harvey
 * @license         MIT License
 * @link            https://github.com/chrisnharvey/CodeIgniter-  PDF-Generator-Library

 */
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class pdf extends Dompdf
{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    public function generate($view, $data)
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);

        // Render the PDF
        $this->render();

        // get Canvas 
        $canvas = $this->get_canvas();

        //Landscape
        // $canvas->page_text(37, 580, "Page: {PAGE_NUM} of {PAGE_COUNT}", '', 9, array(0, 0, 0));
        //Portrait
        $canvas->page_text(37, 960, "Page: {PAGE_NUM} of {PAGE_COUNT}", '', 9, array(0, 0, 0));

        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => 0));
    }
}
