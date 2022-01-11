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
            background: rgb(142, 73, 232);
        }

        body {
            width: 100%;
            height: 100vh;
            /* overflow: hidden; */
            padding: 10px;
            background: linear-gradient(#000000 20%, #313131 30%, #535353 100%);
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


        .wrapper .inputField {
            margin: 20px 0;
            width: 100%;
            display: flex;
            height: 45px;
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
            background: rgb(142, 73, 232);
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


        .todoList li .icon {
            position: absolute;
            right: -45px;
            top: 50%;
            transform: translateY(-50%);
            background: #e74c3c;
            width: 45px;
            text-align: center;
            color: #fff;
            padding: 10px 15px;
            border-radius: 0 3px 3px 0;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .todoList li:hover .icon {
            right: 0px;
        }

        .wrapper .footer {
            display: flex;
            width: 100%;
            margin-top: 20px;
            align-items: center;
            justify-content: space-between;
        }

        .footer button {
            padding: 6px 10px;
            border-radius: 3px;
            border: none;
            outline: none;
            color: #fff;
            font-weight: 400;
            font-size: 16px;
            margin-left: 5px;
            background: #8E49E8;
            cursor: pointer;
            user-select: none;
            opacity: 0.6;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .footer button.active {
            opacity: 1;
            pointer-events: auto;
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
                    <a href="/task/{{$task->id}}" name="edit"><i class="material-icons">edit</i></a>
                    <form action="/task/{{$task->id}}" class="inline-block">
                        <button type="submit" name="delete" formmethod="POST"><i class="material-icons">delete</i></button>
                        {{ csrf_field() }}
                    </form>
                </span>

            </li>
            <!-- data are comes from local storage -->
            @endforeach
        </ul>
        <div class="footer">
            <span>You have <span class="pendingTasks"></span> pending tasks</span>
        </div>
    </div>

    <script>
        const inputBox = document.querySelector(".inputField input");
        const addBtn = document.querySelector(".inputField button");
        const todoList = document.querySelector(".todoList");
        const deleteAllBtn = document.querySelector(".footer button");
        // onkeyup event
        inputBox.onkeyup = () => {
            let userEnteredValue = inputBox.value; //getting user entered value
            if (userEnteredValue.trim() != 0) { //if the user value isn't only spaces
                addBtn.classList.add("active"); //active the add button
            } else {
                addBtn.classList.remove("active"); //unactive the add button
            }
        }
        showTasks(); //calling showTask function
        addBtn.onclick = () => { //when user click on plus icon button
            let userEnteredValue = inputBox.value; //getting input field value
            let getLocalStorageData = localStorage.getItem("New Todo"); //getting localstorage
            if (getLocalStorageData == null) { //if localstorage has no data
                listArray = []; //create a blank array
            } else {
                listArray = JSON.parse(getLocalStorageData); //transforming json string into a js object
            }
            listArray.push(userEnteredValue); //pushing or adding new value in array
            localStorage.setItem("New Todo", JSON.stringify(listArray)); //transforming js object into a json string
            showTasks(); //calling showTask function
            addBtn.classList.remove("active"); //unactive the add button once the task added
        }

        function showTasks() {
            let getLocalStorageData = localStorage.getItem("New Todo");
            if (getLocalStorageData == null) {
                listArray = [];
            } else {
                listArray = JSON.parse(getLocalStorageData);
            }
            const pendingTasksNumb = document.querySelector(".pendingTasks");
            pendingTasksNumb.textContent = listArray.length; //passing the array length in pendingtask
            if (listArray.length > 0) { //if array length is greater than 0
                deleteAllBtn.classList.add("active"); //active the delete button
            } else {
                deleteAllBtn.classList.remove("active"); //unactive the delete button
            }
            let newLiTag = "";
        }
    </script>

</x-app-layout>