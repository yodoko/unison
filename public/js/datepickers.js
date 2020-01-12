
{
    function isBissextile(year) {
        return (year % 4 == 0) && (year % 100 != 0) || (year % 400 == 0);
    }
    
    function totalMonthDays(month, year) {
        switch(month) {
            case 1:case 3:case 5:case 7:case 8:case 10:case 12: {
                return 31;
            } case 4:case 6:case 9:case 11: {
                return 30;
            } case 2: {
                return isBissextile(year) ? 29 : 28;
            } default: {
                return -1;
            }
        }
    }
    
    const dateInputDivs = document.getElementsByClassName("date-input");
    
    for(let i = 0; i < dateInputDivs.length; ++i) {
        const dateInputDiv = dateInputDivs[i];
        
        const dnDay = dateInputDiv.getElementsByClassName("dn-day")[0];
        const dnMonth = dateInputDiv.getElementsByClassName("dn-month")[0];
        const dnYear = dateInputDiv.getElementsByClassName("dn-year")[0];
        
        dnDay.addEventListener("change", function(event) {
            let day = Math.round(parseFloat(this.value));
            
            if(isNaN(day) || day < 1) {
                day = 1;
            }
            
            const month = parseInt(dnMonth.value);
            const year = parseInt(dnYear.value);
            const daysCount = totalMonthDays(month, year);
            
            if(day > daysCount) {
                day = daysCount;
            }
            
            this.value = "" + day;
            
            if(this.value.length < 2) {
                this.value = "0" + this.value;
            }
        });
        
        dnMonth.addEventListener("change", function(event) {
            let month = Math.round(parseFloat(this.value));
            
            if(isNaN(month) || month < 1) {
                month = 1;
            }
            
            if(month > 12) {
                month = 12;
            }
            
            this.value = "" + month;
            
            if(this.value.length < 2) {
                this.value = "0" + this.value;
            }
            
            dnDay.dispatchEvent(new Event("change"));
        });
        
        dnYear.addEventListener("change", function(event) {
            let year = Math.round(parseFloat(this.value));
            
            if(isNaN(year)) {
                year = 1970;
            }
            
            this.value = "" + year;
            
            dnDay.dispatchEvent(new Event("change"));
        });
    }
}
