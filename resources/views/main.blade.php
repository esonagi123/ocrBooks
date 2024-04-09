<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    <script src="../js/main.js"></script>
    <title>Main</title>
</head>
<body>
    <div class="btnmiddle">
        <button class="custombtn custom1 btn-1">
            <h2>WEEKLY</h2>
            <p>36,500</p>
        </button>
        <button class="custombtn custom1 btn-1">
            <h2>MONTHLY</h2>
            <p>₩ 723,500</p>
        </button>
        <button class="custombtn custom btn-3">
            <p>SHOW GRAPH</p>
        </button>
    </div>

    <div class="List">
        <span id="setDate"></span>
        <div><span id="yesterday"></span></div>
        <div><span id="tomorrow"></span></div>
        <div><span id="nextMonth"></span></div>
        <div class="month">
            <p><button class="date"> < </button> 3월 <button> > </button></p>
        </div>
    </div>
</body>
</html>