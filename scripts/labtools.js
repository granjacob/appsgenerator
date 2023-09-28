
var item, data, key;

var textareaAttributes = document.getElementById('attributes');
var textareaMethods = document.getElementById('methods');

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
    constructor( name, type )
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



class ClassMethod {
    constructor( name )
    {
        this.name = name;
        this.parameters = [];
        this.body = "";
        this.readonly = false;
    }
}

class ClassSummary {
    constructor()
    {
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
        this.methods.push( new ClassMethod( "set" + finalName  ) );
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
            result = result + "<li>" + this.methods[method].name + "</li>"
        }
        result = result +"</ul>";
        return result;
    }
}


classSummary = new ClassSummary();

function refreshSummary()
{
    document.getElementById('classAttributes').innerHTML = classSummary.writeAttributes();
    document.getElementById('classMethods').innerHTML = classSummary.writeMethods();
}

textareaAttributes.addEventListener("keyup", function(event) {
    classSummary.clearAttributes();
    classSummary.clearMethods();
    var mytext = textareaAttributes.value;
    var lines = mytext.split('\n');
    for (var l in lines) {
        classSummary.addAttribute( lines[l] );
        classSummary.addGetterSetter( lines[l] );
    }
    refreshSummary();
});


textareaMethods.addEventListener("keyup", function(event) {
    classSummary.clearMethods();
    var mytext = textareaMethods.value;
    var lines = mytext.split('\n');
    for (var l in lines) {
        classSummary.addMethod( lines[l] );
    }
    refreshSummary();
});