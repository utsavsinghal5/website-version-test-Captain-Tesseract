<?php
/**
* @package   BaForms
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

class pdf
{
    public $settings;
    public $fields;
    
    public function __construct($fields, $settings)
    {
        $this->settings = $settings;
        $this->fields = $fields;
    }

    public function create($fileName)
    {
        $dir = JPATH_ROOT.'/'.PDF_STORAGE;
        if (PDF_STORAGE == 'images/baforms/pdf' && !JFolder::exists($dir)) {
            JFolder::create(JPATH_ROOT.'/images/baforms');
            JFolder::create($dir);
        }
        if (!JFolder::exists($dir)) {
            return;
        }
        include JPATH_ROOT.'/components/com_baforms/libraries/pdf-submissions/tfpdf.php';
        $pdf = new tFPDF($this->settings->orientation, 'mm', $this->settings->size);
        $pdf->SetAutoPageBreak(true);
        $pdf->AddPage();
        $pdf->AddFont('Roboto','','Roboto-Regular.ttf',true);
        $pdf->AddFont('RobotoBold','','Roboto-Bold.ttf',true);
        if ($this->settings->title) {
            $pdf->SetFont('RobotoBold', '', 24);
            $pdf->MultiCell(0, 10, ' ');
            $pdf->MultiCell(0, 12, baformsHelper::$shortCodes->{'[Form Title]'}, 0, 'C');
            $pdf->MultiCell(0, 14, ' ');
        }
        foreach ($this->fields as $field) {
            if ((!$this->settings->empty && $field->value == '') || $field->type == 'upload') {
                continue;
            }
            $pdf->SetFont('RobotoBold', '', 12);
            $pdf->MultiCell(0, 10, $field->title, 0, 'L');
            if ($field->type == 'total') {
                $thousand = $field->options->thousand;
                $separator = $field->options->separator;
                $decimals = $field->options->decimals;
                $str = '';
                $pdf->SetFont('Roboto', '', 12);
                $object = $field->object;
                $total = $object->total * 1;
                if ($field->options->tax->enable) {
                    $tax = $total * $field->options->tax->value / 100;
                    $total += $tax;
                }
                if ($field->options->cart) {
                    foreach ($object->products as $products) {
                        foreach ($products as $product) {
                            $price = baformsHelper::renderPrice($product->total, $thousand, $separator, $decimals);
                            if (empty($field->options->position)) {
                                $price = $field->options->symbol.$price;
                            } else {
                                $price .= $field->options->symbol;
                            }
                            $str = $product->title.' x '.$product->quantity.': '.$price;
                            $pdf->MultiCell(0, 10, $str, 0, 'L');
                        }
                    }
                }
                if (isset($object->shipping) || isset($object->promo) || $field->options->tax->enable) {
                    $price = baformsHelper::renderPrice((string)$object->total, $thousand, $separator, $decimals);
                    if (empty($field->options->position)) {
                        $price = $field->options->symbol.$price;
                    } else {
                        $price .= $field->options->symbol;
                    }
                    $str = JText::_('SUBTOTAL').': '.$price;
                    $pdf->MultiCell(0, 10, $str, 0, 'L');
                }
                if (isset($object->shipping)) {
                    $price = baformsHelper::renderPrice((string)$object->shipping->price, $thousand, $separator, $decimals);
                    if (empty($field->options->position)) {
                        $price = $field->options->symbol.$price;
                    } else {
                        $price .= $field->options->symbol;
                    }
                    $str = JText::_('SHIPPING').': '.$object->shipping->title.' '.$price;
                    $pdf->MultiCell(0, 10, $str, 0, 'L');
                }
                if (isset($object->promo) && $object->promo == $field->options->promo->code) {
                    $discount = $field->options->promo->discount * 1;
                    if ($field->options->promo->unit == '%') {
                        $discount = $total * $discount / 100;
                    }
                    $price = baformsHelper::renderPrice((string)$discount, $thousand, $separator, $decimals);
                    if (empty($field->options->position)) {
                        $price = $field->options->symbol.$price;
                    } else {
                        $price .= $field->options->symbol;
                    }
                    $str = JText::_('DISCOUNT').': '.$price;
                    $pdf->MultiCell(0, 10, $str, 0, 'L');
                }
                if ($field->options->tax->enable) {
                    $price = baformsHelper::renderPrice((string)$tax, $thousand, $separator, $decimals);
                    if (empty($field->options->position)) {
                        $price = $field->options->symbol.$price;
                    } else {
                        $price .= $field->options->symbol;
                    }
                    $str = $field->options->tax->title.': '.$price;
                    $pdf->MultiCell(0, 10, $str, 0, 'L');
                }
                $price = baformsHelper::renderPrice($field->value, $thousand, $separator, $decimals);
                if (empty($field->options->position)) {
                    $price = $field->options->symbol.$price;
                } else {
                    $price .= $field->options->symbol;
                }
                $str = JText::_('TOTAL').': '.$price;
            } else {
                $str = str_replace('<br>', ' ', $field->value);
                $str = strip_tags($str);
            }
            $pdf->SetFont('Roboto', '', 12);
            $pdf->MultiCell(0, 10, $str, 0, 'L');
            $pdf->MultiCell(0, 4, ' ');
        }
        $pdf->Ln();
        $fileName = JFile::makeSafe($fileName);
        $i = 1;
        $name = $fileName;
        $dir .= '/';
        while (JFile::exists($dir.$name.'.pdf')) {
            $name = $fileName.'-'.($i++);
        }
        $file = $dir.$name.'.pdf';
        $pdf->Output('F', $file);

        return $file;
    }
}