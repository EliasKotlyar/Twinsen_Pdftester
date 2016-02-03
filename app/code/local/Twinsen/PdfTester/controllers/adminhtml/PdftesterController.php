<?php


class Twinsen_PdfTester_Adminhtml_PdftesterController
    extends Mage_Adminhtml_Controller_Action
{
    public function invoiceAction()
    {
        if ($invoiceId = $this->getRequest()->getParam('invoice_id')) {
            if ($invoice = Mage::getModel('sales/order_invoice')->load(
                $invoiceId
            )
            ) {
                $pdf = Mage::getModel('sales/order_pdf_invoice')->getPdf(
                    array($invoice)
                );
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename="pdf.pdf"');
                echo $pdf->render();

            } else {
                $this->_forward('noRoute');
            }
        }
    }
}