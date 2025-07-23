<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class PDFController extends Controller
{
    public function index()
    {
        return view('pdf.upload');
    }

    public function readPDF(Request $request)
    {
        // Validate the file
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        // Upload the file
        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $filePath = $file->store('pdfs');

            // Read the PDF file content
            $text = Pdf::getText(storage_path('app/' . $filePath));

            // Display the extracted text content
            return view('pdf.result', compact('text'));
        }

        return redirect()->back()->with('error', 'Something went wrong.');
    }
}
