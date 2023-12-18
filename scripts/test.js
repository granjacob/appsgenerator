

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
            if (this.isObject( content )) {    
                if (content.element)
                    this.element.innerHTML = content.element.outerHTML;
                else
                    this.element.innerHTML = content.outerHTML;
            }
            else {
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

var ahref = new Gobject( 'a', { "href" : "https://www.google.com"},  "Grouw up!" );

class GDiv extends Gobject {
    constructor( attributes, content )
    {
        super( 'div', attributes, content );
    }
}

var div = new GDiv( { "href" : "https://www.google.com"}, ahref );


document.write( ahref.write() );
document.write( div.write() );

newElement = function( tagName, attributes, content ) {
    return new Gobject( tagName, attributes, content );    
};


var body = newElement( 'div', {}, 
            newElement('p',null, 'Hello world!') 
    );

    document.write( body.outerHTML )