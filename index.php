<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script type="module" src="./js/script.js"></script>
    <title>Vue To Do List</title>
</head>

<body>

    <div id="app" class="container ">
        <header>
            <button @click="getData()">carica</button>
            <div class="text-center m-3 d-flex flex-column  justify-content-center align-items-center ">
                <h1>Posti Da Vedere</h1>
            </div>
        </header>
        <!-- Main **** List -->
        <main class="my-4">
            <ul class="list-group mb-5 m-3">
                <!-- List made with v-for -->
                <li class="list-group-item  d-flex justify-content-between m-1 pointer" v-for="(item,index) in toSee"
                    :key="item.id"  >
                    <span :class="{'text-dec ' : item.done}" @click="ToggleToSee(index)">{{item.city}} </span>
                    <button class="d-flex justify-content-center align-items-center " @click="deleteItem(index)" >
                        <i class="fa-regular fa-circle-xmark pointer"></i>
                    </button>
                </li>
            </ul>
            <!-- Form for add elements -->
            <div class="my-3 p-3">
                <label for="add" class="form-label fs-3">Aggiungi Elemento</label>
                <input type="text" class="form-control  " id="add" v-model="newObj.city" @keyup.enter="addItem">
                <button class="btn btn-secondary  my-2 " @click="addItem">Aggiungi</button>
            </div>
        </main>
    </div>
</body>
</html>