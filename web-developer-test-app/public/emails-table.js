let filtering = false;
let previousDomain = "";
let domain = "";
let table = document.getElementById("emails_table");
let rows = table.rows
let providers = findProviders();

function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filterInput");
    filter = input.value.toUpperCase();
    //get table
    table = document.getElementById("emails_table");
    //get table rows and put them in an array
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        //get email address in from the row
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
        txtValue = td.textContent;
        //extract provider from the address 
        splitEmail=td.textContent.split("@");
            //check if address contains both provider from one of the buttons and string from search bar
            if (txtValue.toUpperCase().indexOf(filter) > -1 && splitEmail[splitEmail.length-1].indexOf(domain) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function findProviders(){
    let duplicate = false;
    let providers = [];
    for (let i = 1; i < (rows.length); i++) {
        duplicate = false;
        let x = rows[i].getElementsByTagName("TD")[2];
        let splitEmail = x.innerText.split("@");
        let domain = splitEmail[splitEmail.length-1];
        //check if provider already exists, if it doesn't, then push it into array of providers
        for(let i = 0; i < providers.length; i++){
            if(providers[i]===domain){
                duplicate = true;
                break;
            }
        }
        if(!duplicate){
            providers.push(domain);
        }
    }
    return providers;
}

//create provider buttons
for(let i = 0; i < providers.length; i++) {
    var button = document.createElement("button");
    button.innerText = providers[i];
    button.className = "btn btn-outline-success";
    button.onclick = function () {
        //clear filter on second press of the button
        if(previousDomain==providers[i] && filtered){
            previousDomain=providers[i]
            filtered = false;
            domain = "";
            filterTable();
        }
        else{
            previousDomain=providers[i];
            filtered = true;
            domain = providers[i];
            filterTable();
        }        
    }
    var buttonDiv = document.getElementById("buttons");
    buttonDiv.appendChild(button);
}

function sortTable(index) {
    let switching, i, x, y, shouldSwitch;
    switching = true;
    //sorting algorithm
    while (switching) {
        switching = false;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[index];
            y = rows[i + 1].getElementsByTagName("TD")[index];
            if (x.innerText.toLowerCase() > y.innerText.toLowerCase()) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
    }
  }
}