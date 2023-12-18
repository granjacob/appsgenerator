<!doctype html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <script type="text/javascript" src="json-data/data.json?update=<?php echo uniqid(); ?>"></script>
        <link type="text/css" rel="stylesheet" href="css/styles.css?update=<?php echo uniqid(); ?>"/>

        <style type="text/css">

        </style>
    </head>
    <body>
 


    <p>
        Database connection
        <select id="databaseConnections" onchange="selectConnection();"></select>
        
        <button onclick="selectConnection();">Select</button>
</p>
<p id="databaseInformation"></p>
<p><a onclick="toggleElementVisibility('connectionForm')" href="#">Add new connection</a></p>
<p id="connectionForm">ADD_NEW_CONNECTION_FORM</p>
<p>
    Selected connection <span id="selectedConnectionName" model="currentConnection">sdasd</span>
</p>
<p id="resultSampleData"></p>
<p id="resultCars"></p>

<?php
echo "hola!";
?>
        <script type="text/javascript" src="scripts/lab.js?update=<?php echo uniqid(); ?>"></script>
    <script>
        var databaseConnections = [
            {   "value": "conn1", 
                "text": "Connection 1", 
                "username": "root", 
                "password": "123456789", 
                "host" : "localhost",
                "port" : 3306 },
            {"value": "conn2", "text": "Connection 2" },
            {"value": "conn3", "text": "Connection 3" }
        ];
        loadSelectData( 'databaseConnections', databaseConnections );

        document.getElementById('connectionForm').innerHTML = buildForm( 
            [
                {   "name": "inputtext", 
                    "username": "inputtext", 
                    "host":"inputtext", 
                    "password" : "inputtext", 
                    "add": "button",
                    "cancel": "button"
                }
            ],
            "add","add"
        );


        function showElement( elementId )
        {
            document.getElementById(elementId).style.display = 'block';
        }


        function hideElement( elementId )
        {
            document.getElementById(elementId).style.display = 'none';
        }

        function getElementVisibility( elementId )
        {
            return document.getElementById(elementId).style.display;
        }

        function setElementVisibility( elementId, visibility )
        {
            document.getElementById(elementId).style.display = visibility;
        }

        function toggleElementVisibility( elementId )
        {
            if (getElementVisibility( elementId ) == 'none')
                setElementVisibility( elementId, 'block' );
            else
                setElementVisibility( elementId, 'none' );
        }

        setInterval( "refreshApplication( appVariables )", 200 );





        const xhr = new XMLHttpRequest();
       
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const data = xhr.response;
                //console.log(data);
       /*         document.getElementById('resultRequest').innerHTML = showArrayInformation( 
                    sampleData
                    , null, 0 );*/
            } else {
                console.log(`Error: ${xhr.status}`);
            }
        };


        function send()
        {

            xhr.open("GET", "https://jsonplaceholder.typicode.com/users");
            xhr.send();
            xhr.responseType = "json";

        }


        send();


        var lista = new Lista( sampleData );
        
        lista.createContainer('actions', 'top' );
        lista.createContainer('container1', 'top' );
        lista.createContainer('container2', 'top' );
        lista.createContainer('container3', 'top' );
        lista.createContainer('container4', 'top' );
        lista.createContainer('paginator','both');
        lista.createContainer('paginatorBottom','bottom');


        var navigationButtonsFlags = { 
            showPageIndexes : false, 
            align: 'center',
            showHomeButton: false,
            showEndButton: false,
         };
        lista.containers['paginator'].content = lista.writeNavigationButtons( navigationButtonsFlags );

        navigationButtonsFlags.showPageIndexes = true;
        navigationButtonsFlags.align = 'left';

        lista.containers['paginatorBottom'].content = lista.writeNavigationButtons( navigationButtonsFlags );

            lista.calculateColumns();

        lista.name = "ListaElements";
        lista.title =  "Sample data";

        var action = new Action();
        action.name = "delete";
        action.text = "Delete";
        lista.addAction( action );
        action = new Action();
        action.name = "new";
        action.text = "New";
        lista.addAction( action );
        action = new Action();
        action.name = "update";
        action.text = "Update";
        lista.addAction( action );
        action = new Action();
        action.name = "some-service";
        action.text = "Some service";
        lista.addAction( action );
        document.getElementById('resultSampleData').innerHTML = lista.writeList();

     

/*
        var lista = new Lista( cars ); 
        

        lista.calculateColumns();

        lista.name = "ListaElements";
        lista.title = "Cars list"

        var action = new Action();
        action.name = "delete";
        action.text = "Delete";
        lista.addAction( action );
        action = new Action();
        action.name = "new";
        action.text = "New";
        lista.addAction( action );
        action = new Action();
        action.name = "update";
        action.text = "Update";
        lista.addAction( action );
        action = new Action();
        action.name = "some-service";
        action.text = "Some service";
        lista.addAction( action );
        document.getElementById('resultCars').innerHTML = lista.writeListAsHTML();*/
    </script>

    
    </body>
</html>