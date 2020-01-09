
function addClass(element, className) {
    const classNames = className.trim().split(/\s+/);
    
    for(let i = 0; i < classNames.length; ++i) {
        const className = classNames[i];
        
        if(!hasClass(element, className)) {
            element.className += ' ' + className;
            element.className = element.className.replace(/\s+/g, " ").trim();
        }
    }
    
    return element;
}

function removeClass(element, className) {
    const classNames = className.trim().split(/\s+/);
    
    for(let i = 0; i < classNames.length; ++i) {
        const className = classNames[i];
        
        const regExp = new RegExp("(^|\\s+)(" + className + ")\\b", "g");
        
        element.className = element.className.replace(regExp, "");
        
        element.className = element.className.replace(/\s+/g, ' ').trim();
    }
    
    if(element.className === "") {
        element.removeAttribute("class");
    }
    
    return element;
}

function hasClass(element, className) {
    const regExp = new RegExp("(^|\\s+)" + className + "(\\s+|$)", "g");
    
    return element.className.match(regExp);
}

function switchClass(element, className) {
    if(hasClass(element, className)) {
        removeClass(element, className);
    } else {
        addClass(element, className);
    }
}

function selectUnique(element, elements) {
    if(elements === undefined) {
        elements = element.parentElement.children;
    }
    
    for(let i = 0; i < elements.length; ++i) {
        // elements[i].removeAttribute("selected");
        removeClass(elements[i], "select");
    }
    
    // element.setAttribute("selected", "selected");
    addClass(element, "select");
}

function enableUnique(element, elements) {
    if(elements === undefined) {
        elements = element.parentElement.children;
    }
    
    for(let i = 0; i < elements.length; ++i) {
        const disableElements = elements[i].querySelectorAll("*");
        
        for(let i = 0; i < disableElements.length; ++i) {
            disableElements[i].disabled = true;
        }
    }
    
    const enableElements = element.querySelectorAll("*");
    
    for(let i = 0; i < enableElements.length; ++i) {
        enableElements[i].disabled = false;
    }
}

function setTabableUnique(element, elements) {
    if(elements === undefined) {
        elements = element.parentElement.children;
    }
    
    for(let i = 0; i < elements.length; ++i) {
        const notTabableElements = elements[i].querySelectorAll("*");
        
        for(let i = 0; i < notTabableElements.length; ++i) {
            // console.log(notTabableElements[i].tabIndex);
            
            if(notTabableElements[i].tabIndex !== -1) {
                notTabableElements[i].tabIndex = -2;
            }
        }
    }
    
    const tabableElements = element.querySelectorAll("*");
    
    for(let i = 0; i < tabableElements.length; ++i) {
        if(tabableElements[i].tabIndex === -2) {
            tabableElements[i].tabIndex = 0;
        }
    }
}

function clickOnEnter(event) {
    if(event.keyCode === 13 || event.keyCode === 32) {
        this.click();
    }
}

function makeFocusable(element) {
    element.tabIndex = 0;
    element.addEventListener("keydown", clickOnEnter);
}

{
    const buttonElements = document.querySelectorAll(".button");
    
    for(let i = 0; i < buttonElements.length; ++i) {
        const element = buttonElements[i];
        
        makeFocusable(element);
    }
}
