<!doctype html>
<html>
    <head>
        <style type="text/css">

            body {
                font-family:Tahoma;
            }
            .row {
                display:block;
                width: 100%;
                padding:7px;
                border: 1px solid #ccc;
                border-radius:3px;
                overflow: hidden;
                margin-top:10px;
                margin-left:10px;
            }

            .row .propName {
                /*background-color:#ccc;*/
                font-weight:bold;
                width: 50%;
                text-transform: capitalize;
                background: rgb(216,239,255);
                background: linear-gradient(90deg, rgba(216,239,255,1) 0%, rgba(217,217,217,0) 52%);
            }

            .row .fieldName {
                background-color:#fcc;
                font-weight:bold;
                width: 50%;
                padding:3px;
                text-transform: capitalize;
            }

            form button {
                border-radius: 3px;
                text-transform: capitalize;
                border:1px inset #ccc;
                margin-top:7px;
            }

            form input[type=text] {
                margin-top:7px;
                border-radius: 3px;
                border: 1px solid #666;
                padding:7px;
            }

            .row .propValue {
                /*font-style: italic;*/
                width:50%;
            }

            .dataInfo div {
                padding: 7px;
            }

            .propValue.main .dataInfo .row {
                display:block;
                float:left;
                clear:none;
                width:auto ;
            }

            .row.main {
                clear:both;
                height:auto;
                width:100%;
            }

            .row.main .propName, .row.main .propValue {
                width:100%;
            }

            .resultRequest {
                width:90%;
            }

        </style>
        <script type="text/javascript">

            var appVariables = [];

            appVariables['currentConnection'] = 'Undefined';


            function refreshApplication( appVariables )
            {
                for (var variable in appVariables) {

                    document.querySelector("[model=" + variable + "]").textContent = 
                        appVariables[variable];

                }
            }

            function setVariable( name, value )
            {
                appVariables[name] = value;
            }


            
            function getVariable( name )
            {
                return appVariables[name];
            }


            var selectedConnection = 0;

            function selectConnection()
            {
                selectedConnection = 
                    document.getElementById('databaseConnections').selectedIndex;
                console.log( selectedConnection );
                document.getElementById('databaseInformation').innerHTML = 
                    showArrayInformation( databaseConnections[selectedConnection] );
                    console.log( databaseConnections[selectedConnection].text  );
                setVariable( 'currentConnection', databaseConnections[selectedConnection].text );
            }

            function showArrayInformation( data, format )
            {
                console.log( data );
                var result = "<div class='dataInfo'>";
                for (var property in data) {
                    result = result + "<div class='row " + (!isNaN( property ) ? 'main' : property) + "'><div class='propName'>";
                    result = result + property;
                    result = result + "</div>";
                    
                    result = result + "<div class='propValue "  + (!isNaN( property ) ? 'main' : property) + "'>";

                    var currentObject = data[property];
                    if (typeof currentObject === 'object') {
                        result = result + showArrayInformation( currentObject );
                    } else {
                        result = result + data[property];

                    }

                    result = result + "</div></div>";

                    
                    
                }

                result = result + "</div>";
                return result;
            }

            function buildForm( formFields, formName, formAction )
            {

                var result = "<form><div class='form " + formName + "'>";
                for (var field in formFields[0]) {
                    result = result + "<div class='row'><div class='fieldName'>";
                    result = result + field;
                    result = result + "</div>";
                    
                    result = result + "<div class='fieldValue'>";
                    var formDefinition = formFields[0];
                    switch (formDefinition[field]) {
                        case 'select':
                            result = result + '<select></select>';
                            break;
                        case 'inputtext':
                            result = result + '<input type="text" id="'+field+'" name="'+field+'"/>';
                            break;
                        case 'button':
                            result = result + '<button id="'+field+'" name="'+field+'">'+field+'</button>';
                            break;
                    }
                    result = result + "</div></div></form>";
                    
                }

                result = result + "</div>";
                return result;
            }

            function loadSelectData( selectId, dataArray )
            {
                var selectItem = document.getElementById(selectId);
                for (var option in dataArray) {
                    var opt = document.createElement("option");
                    opt.value = dataArray[option].value;
                    opt.text = dataArray[option].text;
                    selectItem.appendChild( opt );
                }
            }

        </script>
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
<p id="resultRequest"></p>
<?php
echo "hola!";
?>
    <script>
        var databaseConnections = [
            {   "value": "conn1", 
                "text": "Connection 1", 
                "username": "springboot", 
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
                document.getElementById('resultRequest').innerHTML = showArrayInformation( 
                    [
	{
		color: "red",
		value: "#f00"
	},
	{
		color: "green",
		value: "#0f0"
	},
	{
		color: "blue",
		value: "#00f"
	},
	{
		color: "cyan",
		value: "#0ff"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	}
]
                    
                    , "vertical,horizontal" );
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


    </script>
    </body>
</html>