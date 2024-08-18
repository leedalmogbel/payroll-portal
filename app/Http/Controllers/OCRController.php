<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Dompdf\Dompdf;
use Dompdf\Options;

class OCRController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Validate the image upload
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Save the uploaded image
        $imagePath = $request->file('image')->store('images');

        // Perform OCR on the image
        $text = (new TesseractOCR(storage_path('app/' . $imagePath)))->run();

        // Save the extracted text to a PDF file
        $pdfPath = $this->saveTextToPDF($text, $imagePath . '.pdf');

        // Return response with text and PDF path
        return response()->json([
            'text' => $text,
            'pdf_path' => $pdfPath
        ]);
    }

    private function saveTextToPDF($text, $filename)
    {
        // Create Dompdf instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML content (extracted text) into Dompdf
        $dompdf->loadHtml('<html><body>' . $text . '</body></html>');

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render HTML as PDF
        $dompdf->render();

        // Save the PDF file
        $pdfPath = storage_path('app/' . $filename);
        file_put_contents($pdfPath, $dompdf->output());

        return $pdfPath;
    }
}