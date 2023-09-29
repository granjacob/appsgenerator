<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

   
    <style>
        * {
            outline: none;
        }

        body {
            font-family: 'Consolas';
            font-size: 16pt;
        }

        textarea,
        input[type=text] {
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        textarea {
            font-size: 14pt;
            min-height: 300px;
        }

        .keyword {
            color: blue;
            font-weight: bold;
        }


        .operator {
            color: red;
            font-weight: bold;
        }

        .objectSummary h1 {
            border-bottom: 4px solid #666;
        }

        .objectSummary li, .objectSummary ul {
            list-style-type: none;
            margin:0;
            padding:0;
        }

        .methodParameters {
            display: inline-block;
        }

        .amethodName {
            display: inline-block;
            clear:none;
            float:left;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="tableMain overflow-auto">
            <div class="row">
                <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                            <p><span class="keyword">class</span><input type="text" id="className" placeholder="class name" /></p>
                        </div>
                        <div class="col-sm">
                            <p><span class="keyword">extends</span><input type="text" id="extensionClass" placeholder="extension class" /></p>
                        </div>
                        <div class="col-sm">
                            <p><span class="operator">{</span></p>
                        </div>
                    </div>
                    <p>Attributes<br /><textarea id="attributes">
llantas
sillas
ventanas
luces</textarea></p>
                    <p>Methods<br /><textarea id="methods">
meterCambio
meterReversa
meterPrimera
meterSegunda
meterTercera
meterCuarta
meterQuinta
agregarLlanta
removerLlanta
prenderLuces
prenderLucesAltas
apagar
prender
girarIzquierda
girarDerecha
acelerar
frenar
meterClotch
quitarClotch
soltarFreno
soltarAcelerador</textarea></p>
                    <p><span class="operator">}</span></p>
                </div>
                <div class="col-sm">
                    <div class="container-fluid">
                        <div class="objectSummary overflow-auto">
                            <h1>Summary</h1>


                            <h2>Class name</h2>
                            <p id="className"></p>

                            <h2>Extends from</h2>
                            <p id="classExtends"></p>

                            <h2>Constructors</h2>
                            <p id="constructors"></p>

                            <h2>Attributes</h2>
                            <p id="classAttributes"></p>

                            <h2>Methods</h2>
                            <p id="classMethods"></p>

                            <h2>Source code</h2>
                            <p id="sourceCode"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/labtools.js?id=<?php echo uniqid(); ?>"></script>
</body>

</html>