var myErrors = [];
startTrackingErrors = true;

/*    window.onerror = function (errorMessage, url, lineNumber) {
    if (!startTrackingErrors) { return false; }
    myErrors.push({
      errorMessage : errorMessage,
      url : url,
      lineNumber : lineNumber
    });
    return true;
};*/



var appVariables = [];

appVariables['currentConnection'] = 'Undefined';


function refreshApplication(appVariables) {
    for (var variable in appVariables) {

        document.querySelector("[model=" + variable + "]").textContent =
            appVariables[variable];

    }
}

function setVariable(name, value) {
    appVariables[name] = value;
}



function getVariable(name) {
    return appVariables[name];
}


var selectedConnection = 0;

function selectConnection() {
    selectedConnection =
        document.getElementById('databaseConnections').selectedIndex;
   // console.log(selectedConnection);
    document.getElementById('databaseInformation').innerHTML =
        showArrayInformation(databaseConnections[selectedConnection]);
    //console.log(databaseConnections[selectedConnection].text);
    setVariable('currentConnection', databaseConnections[selectedConnection].text);
}

function Action()
  {
    this.name = "";
    this.text = "";
    this.service = "";
  }


class Gobject
{
    constructor()
    {
        this.id = "";
        this.name = "";
        this.description = "";
        this.text = "";
        this.link = "";
        this.service = "";
    }

    write = function() 
    {
        return this.text;
    }
}

class GobjectList
{
    constructor()
    {
        this.gobjects = [];
    }
    
    write()
    {
        for (var gobjectIndex in this.gobjects) {
            this.gobjects[gobjectIndex].write();
        }
    }

    addAssoc( gobject )
    {
        this.gobjects[gobject.name] = gobject;
    }

    removeAssoc( key )
    {
        delete this.gobjects[key];
    }
}

/*

class ActionLink extends Gobject {
    write()
    {
        return '<a href="#">' + this.text + '</a>';
    }
}

class ActionLinkList extends GobjectList {
    write()
    {

    }
}


class ActionButton extends Gobject {
    write()
    {
        return '<button>' + this.text + '</button>';
    }
}

class ActionList extends GobjectList {

}
*/
function Container() {
    this.id = "";
    this.name = "";
    this.order = "auto";
    this.position = "top";
    this.content = "";
    // top, bottom, both
    this.openContainer = function () {
        return '<div class="container-fluid"><div class="managementBar">';
    }

    this.closeContainer = function () {
        return "</div></div>";
    }

    this.addContent = function (content) {
        this.content = content;
    }

    this.getContent = function () {
        return this.content + this.name;
    }

    this.writeContainer = function(position) {
        if (position == this.position || this.position == "both")
            return this.openContainer() + this.getContent() + this.closeContainer();
        return "";
    }
}

class Paginator extends Gobject {
    
    constructor( totalItems )
    {
        super();
        this.homeButton = 0;
        this.previousButton = 0;
        this.nextButton = 0;
        this.endButton = 0;
        this.totalItems = 0;
        this.currentPage = 0;
    }

    write()
    {

    }

    getPageLink()
    {

    }

    
}

var paginator = new Paginator();
paginator.totalItems = 100;

console.log( paginator );

function Lista(data) {
    this.name = "";
    this.data = data;
    this.columns = [];
    this.actions = [];
    this.containers = [];
    this.rowsPerPage = 10;
    this.maxVisiblePageIndexes = 4;


    this.createContainer = function (containerName, containerPosition) {
        var container = new Container();
        container.name = containerName;
        container.position = containerPosition;
        this.addContainer(container);
    }

    this.addContainer = function (container) {
        this.containers[container.name] = container;
    }

    this.addTopContainer = function (container) {
        container.position = 'top';
        this.addContainer(container);
    }

    this.addBottomContainer = function (container) {
        container.position = 'bottom';
        this.addContainer(container);
    }

    this.addBothContainer = function(container) {
        container.position = 'both';
        this.addContainer(container);
    }

    this.write = function () {
        for (var col in this.columns) {
            alert(this.columns[col]);
        }
    }


    this.addAction = function (action) {
        this.actions[action.name] = action;
    }

    this.removeAction = function (actionName) {
        this.actions[actionName] = null;
    }

    this.calculateColumns = function (data, prefix) {
        if (typeof prefix === 'undefined')
            prefix = "";

        if (data == null)
            data = this.data;
        var finalPrefix = prefix + ".";
        var prefix = (
            (isNaN(prefix) && prefix.length > 0) ?
            finalPrefix :
            '');
        for (var key in data) {

            if (typeof data[key] === 'object' && data[key]) {

                this.calculateColumns(data[key], prefix + key);
            } else {

                var newColumn = prefix + key;
                this.columns[newColumn] = newColumn;
            }
        }

    }

    this.writeRowCheckColumn = function (text) {
        return "<th>" + '<input type="checkbox"/>' + "</th>";
    }

    this.writeRowCheck = function (rowNum) {
        return "<td>" + '<input type="checkbox"/>' + "</td>";
    }

    this.writeRowNumColumn = function (text) {
        return "<th>" + text + "&nbsp;" + "</th>";
    }

    this.writeRowNumColumnValue = function (rowNum) {
        return "<td><span>" + rowNum + "</span>&nbsp;" + "</td>";
    }

    this.writeContainers = function (position) {
        var result = "";
        for (var container in this.containers) {
            var current = this.containers[container];
            result = result + current.writeContainer(position);
        }
        return result;
    }

    this.writeColumns = function (columns) {
        var result = "";
        if (columns == null)
            columns = this.columns;
        for (var col in columns) {
            result = result + '<th>' + col + '</th>';
        }

        return '<thead><tr>' + this.writeRowCheckColumn() + this.writeRowNumColumn("") + result + '</tr></thead>'
    }

    this.fetchDataByKey = function (key, data) {
        //console.log(key);
        if (data == null)
            data = this.data;

        if (data[key]) {
            return data[key];
        }
        var parts = key.split('.');
        if (parts.length > 1) {
            if (data[parts[0]]) {
                var parentKey = parts[0];
                parts.splice(0, 1);
                return this.fetchDataByKey(parts.join('.'), data[parentKey]);
            } else {
                return '<span class="navalue">N/A</span>';
            }
        }

    }

    this.writeListData = function (data) {
        if (data == null)
            data = this.data;
        var result = "";
        for (var row in data) {
            result = result + "<tr>" + this.writeRowCheck() + this.writeRowNumColumnValue(row + 1);
            var i = 0;
            for (var key in this.columns) {
                result = result + '<td>' + this.fetchDataByKey(key, data[row]) + '</td>';
                i++;
            }

            result = result + "</tr>";

        }

        return '<tbody>' + result + '</tbody>'
    }

    this.writeList = function (attributes) {
        var result = this.writeTitle() + this.writeManagementBar() +
            '<div class="container-fluid"><div class="tableMain overflow-auto"><table class="TableElements ' + this.name + '">' +
            this.writeColumns() +
            this.writeListData() +
            '</table></div></div>' + this.writeManagementBar();

            result = this.writeContainers('top') + result;
            result = result + this.writeContainers('bottom');
        return result;
    }

    this.writeListAsHTML = function () {
        
        var result = '<textarea style="width:100%">' + this.writeList() + '</textarea>';
        return result;

    }


    this.writeTitle = function () {
        var result = '<div class="container-fluid"><div class="managementBar">' +
            '<span class="ListTitle">' + this.title + '</span>' +
            '</div></div>';

        return result;

    }

    this.writeManagementBar = function () {
        var result = '<div class="container-fluid"><div class="managementBar">' +
            this.writeActionButtons() +
            this.writeSearch() +
            this.writeNavigationButtons() +
            this.writeGroupOptions() + this.writePageNumbers() +
            '</div></div>';

        return result;
    }

    this.writePageIndexes = function () {
        var result = '<ul class="pageIndexes">';
        for (i = 0; i < 10; i++) {
            result = result + '<li data-action="page-index"><a class="actionButton" href="#">' + (i + 1) + '</a></li>';

        }
        result = result + '</ul>';
        return result;
    }

    this.writeNavigationButtons = function () {

        var result = '<ul class="actionButtons">';
        //for (var action in this.actions) {
        result = result + '<li data-action="back-home"><a class="actionButton" href="#">Home</a></li>';
        result = result + '<li data-action="back"><a class="actionButton" href="#">&lt; Back</a></li>';
        result = result + '<li data-action="page-indexes">' + this.writePageIndexes() + '</li>';
        result = result + '<li data-action="next"><a class="actionButton" href="#">Next &gt;</a></li>';
        result = result + '<li data-action="next-final"><a class="actionButton" href="#">End</a></li>';

        //}
        result = result + '</ul>';
        return result;
    }


    this.writePageNumbers = function () {
        var result = '<label class="labelPageNumbers"><select class="pageNumbers">';
        for (i = 0; i < 10; i++) {
            result = result + '<option value="' + i + '">' + (i + 1) + '</option>';

        }
        result = result + '</select>';
        return result;
    }

    this.writeGroupOptions = function () {
        var ul = document.createElement("ul");
        ul.className = 'groupOptions';


        var aGroupBy =  document.createElement("a");
        aGroupBy.textContent = 'Group by';
        aGroupBy.className = 'actionButton';
        var liGroupBy = document.createElement("li");
        liGroupBy.appendChild( aGroupBy );
        

        var aColumns =  document.createElement("a");
        aColumns.textContent = 'Columns';
        aColumns.className = 'actionButton';
        var liColumns = document.createElement("li");
        liColumns.appendChild( aColumns );
        

        ul.appendChild( liGroupBy );
        ul.appendChild( liColumns );

        return ul.outerHTML.toString();


        var result =
            '<ul class="groupOptions"><li><a class="actionButton" href="#">Group by</a></li><li><a class="actionButton" href="#">Columns</a></li></ul>';
        return result;
    }

    this.writeSearch = function () {
        var result = '<div class="searchPlugin">' +
            '<input placeholder="Something..." type="text"/><button>Search</button>' +
            '</div>';
        return result;
    }


    this.writeActionButtons = function () {
        var result = '<ul class="actionButtons">';
        for (var action in this.actions) {
            var currentAction = this.actions[action];
            result = result + '<li data-action="' + currentAction.name + '"><a class="actionButton">' + currentAction.text + '</a></li>';
        }
        result = result + '<li>' +
            this.writeActionSelectOptions() + '<a href="#" class="actionButton">Do action</a>' +
            '</li>'
        result = result + '</ul>';
        return result;
    }


    this.writeActionSelectOptions = function () {
        var result = "";

        result = result + '<select><option value="select">To do</option>';
        for (var action in this.actions) {
            var currentAction = this.actions[action];
            result = result + '<option value="' + currentAction.name + '">' + currentAction.text + '</option>';
        }

        result = result + '</select>'
        return result;
    }

}



function showArrayInformation(data, format, deepLevel) {
    //console.log( data );
    var result = "<div class='dataInfo container dl" + deepLevel + "'>";
    for (var property in data) {
        result = result + "<div class='row dl" + deepLevel + " " + (!isNaN(property) ? 'main' : property) + "'>"
        result = result + "<div class='propName col dl" + deepLevel + "'>";
        result = result + property;
        result = result + "</div>";

        result = result + "<div class='propValue col dl" + deepLevel + " " + (!isNaN(property) ? 'main' : property) + "'>";

        var currentObject = data[property];
        if (typeof currentObject === 'object') {
            result = result + showArrayInformation(currentObject, null, deepLevel + 1);
        } else {
            result = result + data[property];

        }

        result = result + "</div></div>";



    }

    result = result + "</div>";
    return result;
}

function buildForm(formFields, formName, formAction) {

    var result = "<form><div class='form container " + formName + "'>";
    for (var field in formFields[0]) {
        result = result + "<div class='row'><div class='fieldName col-sm'>";
        result = result + field;
        result = result + "</div>";

        result = result + "<div class='fieldValue col-sm'>";
        var formDefinition = formFields[0];
        switch (formDefinition[field]) {
            case 'select':
                result = result + '<select></select>';
                break;
            case 'inputtext':
                result = result + '<input type="text" id="' + field + '" name="' + field + '"/>';
                break;
            case 'button':
                result = result + '<button id="' + field + '" name="' + field + '">' + field + '</button>';
                break;
        }
        result = result + "</div></div></form>";

    }

    result = result + "</div>";
    return result;
}

function loadSelectData(selectId, dataArray) {
    var selectItem = document.getElementById(selectId);
    for (var option in dataArray) {
        var opt = document.createElement("option");
        opt.value = dataArray[option].value;
        opt.text = dataArray[option].text;
        selectItem.appendChild(opt);
    }
}