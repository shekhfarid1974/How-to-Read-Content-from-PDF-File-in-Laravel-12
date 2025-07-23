<!DOCTYPE html>
<html>
<head>
    <title>Read PDF File in Laravel 12</title>
</head>
<body>

<h2>Upload PDF File</h2>

<form action="{{ route('read.pdf') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Select PDF File:</label>
        <input type="file" name="pdf_file" required>
    </div>
    <br>
    <button type="submit">Read PDF</button>
</form>

</body>
</html>
