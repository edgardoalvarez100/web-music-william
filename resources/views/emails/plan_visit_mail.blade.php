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

    <h3>PLAN A VISIT</h3>

    <p>
        Hello, My name is <b>{{ strtoupper($request->name) }}</b>,
        <br/><br/>
        I would like to visit  Venture Church on  <b>{{ strtoupper($request->weekend) }}</b> during the <b>{{ $request->time }}</b>  service.
        <br/><br/>
        I will be visiting with  <b>{{ $request->adults }}</b> adults service. and  <b>{{ $request->child }}</b> children.
        You can contact me at  <b>{{ $request->phone }}</b> or email   <b>{{ $request->email }}</b>.
    </p>

</body>
</html>