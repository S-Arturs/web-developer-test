class TableCSVExporter {
    constructor (table, includeHeaders = true) {
        this.table = table;
        this.rows = Array.from(table.querySelectorAll("tr"));

        if (!includeHeaders && this.rows[0].querySelectorAll("th").length) {
            this.rows.shift();
        }
    }

    convertToCSV () {
        const lines = [];
        const numCols = this._findLongestRowLength();
        let value;
        for (const row of this.rows) {
            let line="";
            for (let i = 0; i < numCols - 1; i++) {
                if (row.children[i] !== undefined) {
                    value = TableCSVExporter.parseCell(row.children[i]);
                    //don't include a row if checkbox value is false
                    if(value==false){
                        break;
                    }
                    //don't include checkbox into csv
                    if(value==true){
                        continue;
                    }
                    //since we don't include checkbox, we should also skip first column in table header
                    if(value.includes("ch")){
                        continue;
                    }
                    line += value;
                }
                //if end of row is not reached, add comma, if it is reached, add nothing
                line += (i !== (numCols - 1)) ? "," : "";
            }
            if(line!=""){
                lines.push(line);
            }
        }

        return lines.join("\n");
    }
    //finding longest row lenght in case rows are of different lenghts
    _findLongestRowLength () {
        return this.rows.reduce((l, row) => row.childElementCount > l ? row.childElementCount : l, 0);
    }
    
    static parseCell (tableCell) {
        let parsedValue;
        //see if cell contains checkbox
        try{
            parsedValue = tableCell.querySelector("input").checked;
        }
        catch (error){
            //parse cell's contents if it doesn't contain a checkbox
            parsedValue = tableCell.textContent;
            parsedValue = parsedValue.replace(/"/g, `""`);
            parsedValue = /[",\n]/.test(parsedValue) ? `"${parsedValue}"` : parsedValue;
        }
        return parsedValue;
    }
}