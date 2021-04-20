<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VENTURE</title>
    <style>
        body{font-family: arial;color: #444;font-size: 16px;}
    </style>
</head>
<body>

    <h3>CONTACT</h3>

    <p>
        Name: <b>{{ strtoupper($request->name) }}</b> <br>
        E-mail: <b>{{ strtoupper($request->email) }}</b> <br>
        Phone: <b>{{ strtoupper($request->phone) }}</b> <br>
        Message: <b>{{ strtoupper($request->message) }}</b>
    </p>

</body>
</html>