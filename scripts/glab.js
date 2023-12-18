
function refreshPage()
{
    var ps = document.getElementsByTagName("p");
    for (var i in ps) {
        ps[i].innerHTML = "Working!";
    }
}


class Gobject
{
    constructor( elementName,  attributes, content )
    {
        this.elementName = elementName;


        this.element = document.createElement( this.elementName );




        if (this.isObject( attributes )) {
            for (var i in attributes) {
                this.element.setAttribute( i, attributes[i] );
            }
        }
        
        if (!this.isUndefined( content )) {
            console.log('here');
            if (this.isObject( content )) {
                console.log('isobject.....' + id);
                console.log( content.outerHTML );
                if (content.element)
                    this.element.innerHTML = content.element.outerHTML;
                else
                    this.element.innerHTML = content.outerHTML;
            }
            else {
                console.log('NO isobject.....' + id);
                this.element.innerHTML = content;
            }
        }

        this.id = this.element.getAttribute("id");
        this.name = this.element.getAttribute("name");
        this.content = content;
    }

    write() 
    {
        return this.element.outerHTML;
    }

    isObject( variable )
    {
        console.log( typeof variable + variable );
        return (typeof variable == 'object');
    }

    isUndefined( variable )
    {
        return typeof variable == 'undefined';
    }

}

class GColumn extends GObject {
    constructor( elementName, id, name, content, attributes )
    {
        super('td', id, name, content, 
                { "class" : "gcolumn" } 
        );
    }
}

class GCell extends GObject {

}

class GRowCheck extends GObject {

}

class GRow extends GObject {

    constructor( elementName, id, name, content, attributes )
    {
        super('tr', id, name, content, 
                { "class" : "grow" } 
        );
        this.columns = [];
    }

    write()
    {

    }
}

class GModule extends Gobject { 
    constructor( id, name, content, attributes )
    {
        super('div', id, name, content, 
                { "class" : "gmodule" } 
        );
        this.position = 'top';
    }
}

class GGrid extends GObject {
    constructor( id, name, content, attributes )
    {
        super( 'div', id, name, content, 
            { "class" : "ggrid" } 
        );
        this.modules = [];
        this.data = null;
    }

     setData( data )
     {
        this.data = data;
     }

     getData()
     {
        return this.data;
     }
     
     createModule( position )
     {
        var module = new GModule();
        module.position = position;
        this.modules.push( module );
        return this;
     }
}


var grid = new GGrid();
grid.createModule('top').createModule('bottom');


class GController extends GObject
{
    constructor()
    {
        super();
    }
}

class GView extends Gobject
{
    constructor( tagname, id, name, innerHTML, attributes )
    {
        super();
        this.controller = new GController();
        
    }

    append( gobject )
    {

    }
}

class GService
{
    constructor()
    {

    }

    
}

class GButtonController extends GController {
    constructor( id, name, content )
    {
        super();
        this.id = id;
        this.name = name;
        this.text = text;
        this.controller = new GController();
    }
}

class GHref extends GView {
    constructor()
    {
        super(  id, name, content );
    }
    
}

class GButton extends GView {

    constructor( id, name, content )
    {
        super();
        
        
    }

    write()
    {
        var element = document.createElement('button');
        element.setAttribute( 'id', this.id );
        element.setAttribute( 'name', this.name );
        element.innerHTML = this.text;
        return element.outerHTML;
    }
}


var button = null;
var output = "";
for (var i = 0; i < 20; i++) {
    button = new GButton( 
        'idButton' + i, 
        'button' + i, 
        'Button' + i);
    output = output + button.write();

    }

document.write(  output );


class A {
    write()
    {
        return "-------------hola";
    }
}

class B extends A {
    write()
    {
        return "----------------------from B";
    }
}

var b = new B();
document.write( b.write() );


setInterval( "refreshPage()", 10 );



class GTable extends GObject {
}

class GTBody extends GObject {
}

class GTHead extends GTBody {

}
class GTFoot extends GTBody {

}

class GTRow extends  GObject {

}

class GTDataCell extends GObject {

}

class GTHeadCell extends GTDataCell {

}

class GTColumn extends GTDataCell {

}

