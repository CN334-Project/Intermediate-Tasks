<head>
    <style>
        body {
            margin: 0;
            width: 100%;
            background: rgb(57,62,70);
        }

        .bigContainer {
            width: 100%;
            text-align: center;
            background: rgb(57,62,70);
        }
        
        .header {
            margin: 20px;
            font-size: 30px;
            border: none;
            color: white;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            justify-content: center;
            padding-top: 3%;
            font-family: "Helvetica";
            text-decoration: none;
        }

        .container {
            margin-top: -10px;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            justify-content: center;
        }

        .box {
            width: 60%;
            max-width: 650%;
            border: 1px solid rgb(156, 156, 156);
            border-radius: 15px;
            background-color: rgb(255,255,255);
            color: white;
            margin: 5rem;
            padding-top: 2%;
            padding-bottom: 2%;
        }

        .smallBox {
            padding-bottom:2%;
        }

        .input {
            width: 80%;
            height: 60%;
            background: rgb(242,242,242);
            border: 1px solid black;
            border-radius: 7px;
            padding: 15px;
            color: black;
            resize: none;
            font-family: "Helvetica";
            letter-spacing: 1px;
        }
        
        .editBtn {
            margin-top: 1%;
            background: rgb(65, 65, 65);
            color: white;
            border-radius: 10px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 0 0 0 0 rgba(82, 82, 82, 0);
            border: 1px solid rgb(168, 168, 168);
            font-family: "Helvetica";
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="bigContainer">
        <a class="header" href="http://127.0.0.1:8000/dashboard"> Edit Task </a>

        <div class="container">
            <form class="box" method="POST" action="/task/{{ $task->id }}">
                <div class="smallBox">
                    <textarea name="description" class="input"> {{$task->description }} </textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger"> {{ $errors->first('description') }} </span>
                    @endif
                </div>

                <div class="smallBox">
                    <button type="submit" name="update" class="editBtn"> Update task </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</body>
