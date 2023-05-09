
//store the id for menuList item clicked to pass it to 'goto()' function
let path = "";

window.onload = () =>
{
    //get Page Name
    //let pageName = getPageName() + " Page";
    //set page name
    //pageNameControl(pageName);

    //start align the body to the view position
    //setTimeout(startView,5000);
    startView();
    //get all menu List items
    let nav = document.getElementsByTagName("li");

    //check  which item is clicked
    for(let  index = 0; index < nav.length; index++)
    {
        nav[index].onclick = () =>
        {
            //store item id
            path = nav[index].getAttribute('id');
            if(path == null || path == "logOut")
            {

                return;
            }
            endView();

            setTimeout(goto,1000);
        }
    }

    //define mouse
    let mouse = document.getElementsByTagName("html")[0];

    //detect the mouse movement
    mouse.onmousemove = (mouseEvent) =>
    {
        //store mouse position
        let x = mouseEvent.clientX;
        let y = mouseEvent.clientY;

        //define container 2
        let container2 = document.getElementsByClassName("container2")[0];


        // change background linear-gradient angle
        changeLinear(container2,getAngle(container2,x,y)+45);


        //define the search icon
        let searchIcon = document.getElementsByClassName("searchIcon")[0];
        //let searchForm = document.getElementById("searchForm");
        //get the position of search icon
        //let searchIconPosition = searchIcon.getBoundingClientRect();

        // //search icon x and y position and width and height
        // let six = searchIconPosition.x;
        // let siy = searchIconPosition.y;
        // let siw = searchIconPosition.width;
        // let sih = searchIconPosition.height;

        let container1 = document.getElementsByClassName("container1")[0];

        //if mouse is over the 1st container and the search icon clicked stay hiding it
        container1.onmouseover = () => {

            //if button clicked hide search icon
            searchIcon.onclick = () => {
                searchInputsControl(searchIconControl(0));
            }

        }

        container2.onmouseover = () =>
        {
            searchFormControl(searchIconControl(1));

        }


    }


}

//function to direct user to page he clicked
function goto() {

    let dest = "";

    switch (path) {

        case 'home':
            dest = "/Home/";
            break;
        case 'about_us':
            dest = '/About_Us/';
            break;
        case 'jobs':
            dest = "/Jobs/";
            break;
        case 'cv':
            dest = "../CV/";
            break;
        case 'users':
            dest = "/Users/";
            break;
        case 'login':
            dest = "/Login/";
            break;
        case 'signUp':
            dest = "/Sign_Up/";
            break;
    }


    window.location.href = dest;
}

// control the animation of screen view
function startView()
{
    //control body
    let body = document.getElementsByTagName("body");
    //return body to normal view
    body[0].style.transition = "transform 1.5s  ease-in-out";
    body[0].style.transform = "none";

    // control time of appearing of menu and search icon and hiding the page name
    //setTimeout(pageNameControl,100);
    setTimeout(menuControl,1500);
    setTimeout(searchIconControl,1500);
    setTimeout(searchInputsControl,1500);
    setTimeout(searchFormControl,1500);

}

function endView()
{
    let body = document.getElementsByTagName("body");
    body[0].style.overflow = "hidden";
    body[0].style.transition = "transform 1.5s  ease-in-out";
    body[0].style.transform = "scale(0.7) translateX(150vw)";
}

// control (hide) the after and before for page name
function pageNameControl(name="none") {
    let pageName = document.getElementById("pageName");
    switch (name) {
        case "none":
            pageName.style.display = name;
            break;

        default:
            pageName.innerHTML = name;
    }
}

function getPageName()
{
    //url = 127.0.0.1:8000/pageName
    //       startIndex   | startIndex+1

    //get start index
    let startIndex = window.location.href.split('/',100).indexOf('127.0.0.1:8000');

    //return page name
    return window.location.href.split('/',100)[startIndex+1];
}

// control the search icon appearing
function searchIconControl(state=1)
{
    let searchIcon = document.getElementsByClassName("searchIcon")[0];
    //let icon = document.getElementsByTagName("img")[1];

    searchIcon.style.transition = "opacity .9s ease-in-out 0s, transform 1s ease-in-out 0s";
    //icon.style.transition = "width 1s ease, height 1s ease";
    switch (state)
    {
        case 0:

            searchIcon.style.transform = "scale(0)";


            // icon.style.width = "4vw";
            // icon.style.height = "4.5vh";
            // icon.style.padding = "0px";

            searchIcon.style.opacity = '0';

            searchIcon.style.borderTopLeftRadius = "0px";
            searchIcon.style.borderBottomLeftRadius = "0px";
            searchIcon.style.zIndex= '0';

            //return true to make the search inputs appear
            return true;
        case 1:

            // icon.style.width = "2.5vw";
            // icon.style.height = "4.5vh";
            // icon.style.padding = "10px";

            searchIcon.style.borderRadius = "50px";

            searchIcon.style.transform = "none";
            searchIcon.style.opacity = '1';
            searchIcon.style.zIndex= '5';
            //return false to make the search inputs disappear
            return false;
    }

}

//control search inputs (btn and bar)
function searchInputsControl(state=false)
{
    let searchBar = document.getElementById("search_bar");
    let searchBtn = document.getElementById("search_btn");

    searchBar.style.transition = "opacity 2.5s ease, left 0.8s ease, transform 1.5s ease";
    searchBtn.style.transition = "opacity 2.5s ease, left 0.8s ease, transform 1.5s ease";

    //order in opacity is important to avoid hidden issue

    switch (state)
    {
        case true:

            searchFormControl(true);
            searchBtn.style.opacity = '1';
            searchBar.style.opacity = '1';

            searchBar.style.left= "-6vw";
            searchBtn.style.left= "9vw";

            searchBar.style.transform = "scale(1)";
            searchBtn.style.transform = "scale(1)";

            break;

        case false:

            searchBar.style.left= "-5vw";
            searchBtn.style.left= "-1vw";

            searchBar.style.transform = "scale(0)";
            searchBtn.style.transform = "scale(0)";

            searchBtn.style.opacity = '0';
            searchBar.style.opacity = '0';

            searchFormControl(false);


            break;

    }

}

// control the searchForm
function searchFormControl(state=false)
{
    let searchForm = document.getElementById("searchForm");
    searchForm.style.transition = "transform 0.9s ease , opacity 0.5s ease";

    switch (state)
    {
        case true:
            searchForm.style.opacity = '1';
            searchForm.style.transform = "translateX(2vw)";
            searchForm.style.zIndex = '4';

            break;
        case false:
            searchForm.style.opacity = '0';
            searchForm.style.transform = "translateX(5vw)";
            searchForm.style.zIndex = '0';

            break;
    }
}

// control menuWarp
function menuControl()
{
    //control menu warp to avoid overflow hidden at first
    let menuWarp = document.getElementsByClassName('menu_warp')[0];
    menuWarp.style.transition = "top 1.3s ease-in-out 0s";
    menuWarp.style.top = "0px";
    menuWarp.style.overflow = 'visible';
}


// angle of element with mouse
function getAngle(element,x,y)
{
    //let the background make 45deg with the mouse
    const elementX = element.getBoundingClientRect().left + (element.offsetWidth / 2);
    const elementY = element.getBoundingClientRect().top + (element.offsetHeight / 2);

    const deltaX = x - elementX;
    const deltaY = y - elementY;

    const radians = Math.atan2(deltaY, deltaX);

    //return angle made by element (background) with the mouse
    return radians * (180 / Math.PI);
}

// change background linear-gradient angle
function changeLinear(Element,angle)
{
    Element.style.background = "linear-gradient("+ (angle) +"deg,#0A4D68 ,#05BFDB )";
}



