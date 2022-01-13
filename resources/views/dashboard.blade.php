<x-app-layout>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        ::selection {
            color: #ffff;
            background: #00ADB5;
        }

        body {
            background-color: #393E46;

        }

        .wrapper {
            background: #fff;
            max-width: 450px;
            width: 100%;
            margin: 120px auto;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
        }

        .wrapper header {
            font-size: 30px;
            font-weight: 600;
            padding: 10px 15px;

        }

        .wrapper .todoList {
            max-height: 250px;
            overflow-y: auto;
        }

        .todoList li {
            position: relative;
            list-style: none;
            height: 45px;
            line-height: 45px;
            margin-bottom: 8px;
            background: #f2f2f2;
            border-radius: 3px;
            padding: 0 15px;
            cursor: default;
            overflow: hidden;

        }

        .todoList li span {
            position: absolute;
            right: -80px;
            color: white;
            width: auto;
            background: #00ADB5;
            border-radius: 0 3px 3px 0;
            cursor: pointer;
            transition: all 0.3s ease;

        }

        .todoList li:hover span {
            right: 0px;
        }

        .todoList li span i {
            vertical-align: middle;
            padding: 5px;

        }

        .wrapper .footer {
            display: flex;
            width: 100%;
            margin-top: 20px;
            align-items: center;
            justify-content: space-between;
        }
        
        #editIcon:hover {
            color: #75f74d;
        }

        #deleteIcon:hover {
            color: #f74d4d;
        }

    </style>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Tasks List</div>
                    
                    <div class="flex-auto text-right mt-2">
                        <a href="/task" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Task</a>
                    </div>
                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Task</th>
                        <th class="text-left p-3 px-5">Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->tasks as $task)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$task->description}}
                            </td>
                            <td class="action">
                                <a href="/done" name="done" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">done</a>            
                                <a href="/task/{{$task->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                <form action="/task/{{$task->id}}" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    {{ csrf_field() }}
                                </form>
                    
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>             
            </div>
        </div>
    </div> -->

    <div class="wrapper">
        <div class="flex">
            <div class="flex-auto text-2xl mb-4">Tasks List</div>

            <div class="flex-auto text-right mt-2">
                <a href="/task" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Add new Task</a>
            </div>
        </div>


        <ul class="todoList">
            @foreach(auth()->user()->tasks as $task)
            <li class="action">{{$task->description}}
                <span>
                    <a href="/task/{{$task->id}}" name="edit"><i class="material-icons" id="editIcon">edit</i></a>
                    <form action="/task/{{$task->id}}" class="inline-block">
                        <button type="submit" name="delete" formmethod="POST"><i class="material-icons" id="deleteIcon">delete</i></button>
                        {{ csrf_field() }}
                    </form>
                </span>
            </li>
            @endforeach
        </ul>
        <div class="footer">
            <span>You have  <span id="num"></span> pending tasks</span>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        var num = $(".todoList").find("li").length;
        if (num > 1) {
        console.log(num);
        }
        document.getElementById("num").innerHTML = num;
    </script>

</x-app-layout>