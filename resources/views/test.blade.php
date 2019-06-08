<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check All plugin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    {!! Html::script('BackEnd/assets/node_modules/styleswitcher/jquery.checkAll.js') !!}

    <style>
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>

</head>
<body>

<h1>Custom Checkboxes</h1>
<label class="container">One
    <input type="checkbox" checked="checked">
    <span class="checkmark"></span>
</label>
<label class="container">Two
    <input type="checkbox">
    <span class="checkmark"></span>
</label>
<label class="container">Three
    <input type="checkbox">
    <span class="checkmark"></span>
</label>
<label class="container">Four
    <input type="checkbox">
    <span class="checkmark"></span>
</label>


    <div class="group-all">

        <label><input class="group-all-check-all" type="checkbox" name="" id="">Check All</label>
        <div class="clear"></div>

        <li>
            <input class=" group-a-check-all" type="checkbox" name="" id="">
            <label class="container">Roles
                <input class=" group-a-check-all" type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>

            <div class="group-all" action=""></div>
            <ul class="group-a">
                <label class="container">One
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Two
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Three
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Four
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </ul>
        </li>
        <li>
            <input class=" group-b-check-all" type="checkbox" name="" id="">
            <label for="roles"><strong>Roles</strong></label>
            <div class="group-all" action=""></div>
            <ul class="group-b">
                <li>
                    <input type="checkbox">
                    <label>Browse Roles</label>
                </li>
                <li>
                    <input type="checkbox">
                    <label>Browse Roles</label>
                </li>
                <li>
                    <input type="checkbox">
                    <label>Browse Roles</label>
                </li>

            </ul>
        </li>
    </div>


<script type="text/javascript">
    // Specific scope usage
    $('.group-a-check-all').checkAll({
        scope: $('.group-a')
    });

    $('.group-b-check-all').checkAll({
        scope: $('.group-b')
    });
    $('.group-c-check-all').checkAll({
        scope: $('.group-c')
    });
    $('.group-all-check-all').checkAll({
        scope: $('.group-all')
    });
</script>
</body>
</html>

