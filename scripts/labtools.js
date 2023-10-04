
var item, data, key;

var textareaAttributes = document.getElementById('attributes');
var textareaMethods = document.getElementById('methods');

var globalVars = [];

function camelize(str) {
    return str.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index) {
      return index === 0 ? word.toLowerCase() : word.toUpperCase();
    }).replace(/\s+/g, '');
  }

  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

class Variable {
    constructor( name )
    {
        this.name = name;
        this.type = "";
        this.value = "";
        this.readonly = false;
        this.constant = false;
    }
}

class MethodParameter extends Variable {
    constructor( name )
    {
        super(name);   
    }
}

class ClassAttribute extends Variable {
    constructor( name )
    {
        super( name );
        this.accessModifier = "private";
    }
}

class Function extends Variable {
    constructor( name )
    {
        super( name );
    }
}


class ClassMethod {
    constructor( name )
    {
        this.name = name;
        this.parameters = [];
        this.body = "";
        this.readonly = false;
    }

    addParameter( parameter )
    {
        this.parameters.push( parameter );
    }
}

class ClassSummary {
    constructor()
    {
        this.package = "";
        this.className = "";
        this.classExtension = "";
        this.attributes = [];
        this.methods = [];
    }

    setClassName( className )
    {
        this.className = className;
    }

    setClassExtension( classExtension )
    {
        this.classExtension = classExtension;
    }

    addAttribute( attributeName )
    {
        this.attributes.push( new ClassAttribute( attributeName ) );
    }

    addMethod( methodName )
    {
        this.methods.push( new ClassMethod( methodName ) );
    }

    addGetterSetter( attributeName )
    {
        var finalName = capitalizeFirstLetter( camelize( attributeName ) );
        this.methods.push( new ClassMethod( "get" + finalName  ) );
        var setMethod = new ClassMethod( "set" + finalName  );
        setMethod.addParameter( new MethodParameter( attributeName ) );
        this.methods.push( setMethod );
    }

    clearAttributes()
    {
        this.attributes = [];
    }

    clearMethods()
    {
        this.methods = [];
    }

    writeAttributes()
    {
        var result = "<ul>";
        for (var attr in this.attributes) {
            result = result + "<li>" + this.attributes[attr].name + "</li>"
        }
        result = result +"</ul>";
        return result;
    }

    writeMethods()
    {
        var result = "<ul>";
        for (var method in this.methods) {
            result = result + '<li><a class="amethodName" href="#">' + 
            this.methods[method].name + '</a><div>(<ul class="methodParameters">'+
            this.writeMethodParameters( this.methods[method] )
            +'</ul>)</div></li>';
        }
        result = result + "</ul>";
        return result;
    }

    writeMethodParameters( method )
    {
        var result = '';
        for (var i in method.parameters) {
            result = result + '<li class="methodParameter">' + method.parameters[i].name + '</li>';
        }
        return result;
    }
}


classSummary = new ClassSummary();

function refreshSummary()
{

    classSummary.clearAttributes();
    classSummary.clearMethods();
    var mytext = textareaAttributes.value;
    var lines = mytext.split('\n');
    for (var l in lines) {
        classSummary.addAttribute( lines[l] );
        classSummary.addGetterSetter( lines[l] );
    }


    var mytext = textareaMethods.value;
    var lines = mytext.split('\n');
    for (var l in lines) {
        if (lines[l].length > 0)
        classSummary.addMethod( lines[l] );
    }

    document.getElementById('classAttributes').innerHTML = classSummary.writeAttributes();
    document.getElementById('classMethods').innerHTML = classSummary.writeMethods();
    console.log( classSummary );

    for (var v in globalVars) {
        document.getElementById(v).innerHTML = globalVars[v];
    }

}

textareaAttributes.addEventListener("keyup", function(event) {

    refreshSummary();
});


textareaMethods.addEventListener("keyup", function(event) {

    refreshSummary();
});


window.addEventListener("load", function(event) {

    refreshSummary();
});

var elements = document.getElementsByTagName('input');
for (var i in elements) {
    elements[i].addEventListener( 'keyup', function (event) {
        var variableName = 'v_' + this.id;
        globalVars[variableName] = this.value;
        console.log( variableName );
       document.getElementById(variableName).innerHTML = globalVars[variableName];
    });
}