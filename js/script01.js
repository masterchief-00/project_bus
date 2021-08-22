var flag = false;
var slide=false;
var slide_home=false;
var settings_slide=false;
var updateFlag=false;
var notifierFlag=false;
var ticketsFlag=false;
var historyFlag = false;
var delFlag=false;
var optionsFlag=false;
var from;
var to;
function toggle_Res()
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent= document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility ="visible";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility = "hidden";
    faq.style.visibility = "hidden";

    for(var i=0;i<parent.length;i++)
    {
        parent[i].style.border="none";
    }

    parent[0].style.border = "none";
    parent[0].style.borderRight = "solid 6px white"
}
function toggle_busReg() 
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "visible";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility = "hidden";
    faq.style.visibility = "hidden";

    for (var i = 0; i < parent.length; i++) 
    {
        parent[i].style.border = "none";
    }

    parent[1].style.border = "none";
    parent[1].style.borderRight = "solid 6px white";
}
function toggle_busInfo()
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo=document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility="visible";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility = "hidden";
    faq.style.visibility = "hidden";

    for (var i = 0; i < parent.length; i++) 
    {
        parent[i].style.border = "none";
    }

    parent[2].style.border = "none";
    parent[2].style.borderRight = "solid 6px white";
}
function toggle_busDelete() 
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete=document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility="visible";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility = "hidden";
    faq.style.visibility = "hidden";

    for (var i = 0; i < parent.length; i++) {
        parent[i].style.border = "none";
    }

    parent[3].style.border = "none";
    parent[3].style.borderRight = "solid 6px white";
}

function toggle_ticketinfo() 
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility ="visible";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility = "hidden";
    faq.style.visibility = "hidden";
    
    for (var i = 0; i < parent.length; i++) 
    {
        parent[i].style.border = "none";
    }

    parent[3].style.border = "none";
    parent[3].style.borderRight = "solid 6px white";
}
function toggle_ticketDelete() 
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete=document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility="visible";
    faq.style.visibility = "hidden";
    problem.style.visibility = "hidden";


    for (var i = 0; i < parent.length; i++) 
    {
        parent[i].style.border = "none";
    }

    parent[3].style.border = "none";
    parent[3].style.borderRight = "solid 6px white";
}
function toggle_faq()
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem = document.querySelector(".problem-rep");
    var faq=document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility = "hidden";
    faq.style.visibility="visible";

    for (var i = 0; i < parent.length; i++) {
        parent[i].style.border = "none";
    }

    parent[5].style.border = "none";
    parent[5].style.borderRight = "solid 6px white";
}
function toggle_problem()
{
    var defaultDiv=document.querySelector(".default");
    var reservation = document.querySelector(".reservation");
    var busReg = document.querySelector(".bus-reg");
    var busInfo = document.querySelector(".bus-info");
    var busDelete = document.querySelector(".bus-delete");
    var ticketInfo = document.querySelector(".ticket-info");
    var ticketDelete = document.querySelector(".ticket-delete");
    var problem=document.querySelector(".problem-rep");
    var faq = document.querySelector(".faq");
    var parent = document.querySelectorAll(".sidebar ul li");
    
    defaultDiv.style.visibility="hidden";
    reservation.style.visibility = "hidden";
    busReg.style.visibility = "hidden";
    busInfo.style.visibility = "hidden";
    busDelete.style.visibility = "hidden";
    ticketInfo.style.visibility = "hidden";
    ticketDelete.style.visibility = "hidden";
    problem.style.visibility="visible";
    faq.style.visibility = "hidden";

    for (var i = 0; i < parent.length; i++) {
        parent[i].style.border = "none";
    }

    parent[4].style.border = "none";
    parent[4].style.borderRight = "solid 6px white";
}
function toggle_home()
{
    var menuLinks=document.querySelectorAll(".top-menu ul li");
    var menuAnchors=document.querySelectorAll(".top-menu ul li a");
    var adminButton=document.querySelectorAll(".adminButton");
    var list=document.querySelector(".top-menu ul");
    var popUp=document.querySelector(".pop-up");
    var popUp2=document.querySelector(".pop-up2");
    var errorPop = document.querySelector(".errorPop");

    menuLinks[0].style.backgroundColor="#00415f";
    menuAnchors[0].style.color="white";
    if(adminButton.length==0)
    {
        list.style.marginLeft="17%";
    }
    else if (adminButton.length>0)
    {
        list.style.marginLeft="7%";
    }
    setTimeout(function(){popUp.style.transform="translateX(390px)"},2500);
    setTimeout(function () { popUp2.style.transform = "translateY(-60px)" }, 3500);
    setTimeout(function(){popUp.style.transform = "translateX(0px)" }, 18000);
    setTimeout(function() { errorPop.style.transform = "translateY(-50px)" }, 2000);
    setTimeout(function () { errorPop.style.transform = "translateY(0px)" }, 19000);
}
function toggle_services()
{
    var menuLinks=document.querySelectorAll(".top-menu ul li");
    var menuAnchors=document.querySelectorAll(".top-menu ul li a");
    var adminButton = document.querySelectorAll(".adminButton");
    var list = document.querySelector(".top-menu ul");
    var popUp2 = document.querySelector(".pop-up2");
    var errorPop = document.querySelector(".errorPop");

    menuLinks[1].style.backgroundColor="#00415f";   
    menuAnchors[1].style.color="white";
    if (adminButton.length == 0) 
    {
        list.style.marginLeft = "17%";
    }
    else if (adminButton.length > 0) 
    {
        list.style.marginLeft = "7%";
    }
    setTimeout(function () { popUp2.style.transform = "translateY(-60px)" }, 3500);
    setTimeout(function () { errorPop.style.transform = "translateY(-50px)" }, 2000);
    setTimeout(function () { errorPop.style.transform = "translateY(0px)" }, 9000);
}
function toggle_contacts()
{
    var menuLinks=document.querySelectorAll(".top-menu ul li");
    var menuAnchors=document.querySelectorAll(".top-menu ul li a");
    var popUp2 = document.querySelector(".pop-up2");
    menuLinks[2].style.backgroundColor="#00415f";
    menuAnchors[2].style.color="white";
    setTimeout(function () { popUp2.style.transform = "translateY(-60px)" }, 3500);
}
function toggle_login()
{
    var signup=document.querySelector(".sign-up");
    var login=document.querySelector(".login");

    signup.style.transform = 'translateX(900px)';
    login.style.visibility = "visible";
    login.style.transform = 'translateX(-850px)';
}
function toggle_signup()
{
    var signup = document.querySelector(".sign-up");
    var login = document.querySelector(".login");
    
    signup.style.visibility = "visible";
    signup.style.transform = 'translateX(0px)';
    login.style.transform='translateX(0px)';
}
function toggle_adminPanel()
{
    var menuLinks = document.querySelectorAll(".top-menu ul li");
    var menuAnchors = document.querySelectorAll(".top-menu ul li a");
    menuLinks[3].style.backgroundColor = "#00415f";
    var popUp2 = document.querySelector(".pop-up2");
    var errorPop = document.querySelector(".errorPop");
    
    menuAnchors[3].style.color = "white";
    setTimeout(function () { popUp2.style.transform = "translateY(-60px)" }, 3500);
    setTimeout(function () { errorPop.style.transform = "translateY(-50px)" }, 2000);
    setTimeout(function () { errorPop.style.transform = "translateY(0px)" }, 9000);
}
function toggle_adminTheme()
{
    var login = document.querySelector(".login");
    var label1=document.querySelector(".label1");
    var label2=document.querySelector(".label2");
    var switchButton=document.querySelector(".switch");
    var h1=document.querySelector(".login h1");
    var input=document.querySelectorAll(".login form input");
    var submitButton=document.querySelector(".login button");
    var links=document.querySelectorAll(".login a");


    if(!flag)
    {
        login.style.backgroundColor = "#00415f";
        login.style.border="solid 2px white";
        label1.style.color="white";
        label2.style.color = "white";
        switchButton.style.borderColor="white";
        h1.style.color="white";
        submitButton.style.backgroundColor ="#00415f";
        submitButton.style.borderColor="white";
        submitButton.style.color="white";
        for(var i=0;i<input.length;i++)
        {
            input[i].style.borderBottom = "solid 3px white";
            input[i].style.backgroundColor ="#00415f";
            input[i].style.setProperty("--c", "white");
            input[i].style.color="white";
        }
        for(var j=0;j<links.length;j++)
        {
            links[j].style.color="white";
        }
        flag=true;
    }
    else
    {
        login.style.backgroundColor = "white";
        label1.style.color = "#00415f";
        label2.style.color = "#00415f";
        switchButton.style.borderColor = "#00415f";
        h1.style.color = "#00415f";
        submitButton.style.backgroundColor = "white";
        submitButton.style.borderColor = "#00415f";
        submitButton.style.color = "#00415f";
        for (var i = 0; i < input.length; i++) 
        {
            input[i].style.borderBottom = "solid 3px #00415f";
            input[i].style.backgroundColor = "white";
            input[i].style.setProperty("--c", "#00415f");
            input[i].style.color = "#00415f";
        }
        for (var j = 0; j < links.length; j++) 
        {
            links[j].style.color = "#00415f";
        }
        flag = false;
    }
}

function login_mouseOver()
{
    var button=document.querySelector(".login button");

    if(flag)
    {
        button.style.backgroundColor = "white";
        button.style.color = "#00415f";
    }
    else
    {
        button.style.backgroundColor ="#00415f";
        button.style.color="white";
    }
}
function login_mouseOff() 
{
    var button = document.querySelector(".login button");

    if (flag) 
    {
        button.style.backgroundColor = "#00415f";
        button.style.color = "white";
    }
    else 
    {
        button.style.backgroundColor = "white";
        button.style.color = "#00415f";
    }
}
function input_focus(i)
{
    var input=document.querySelectorAll(".login form input");

    if(flag)
    {
        input[i].style.borderBottom = "solid 2px white";
        input[i].style.backgroundColor = "#002536";
    }
    else
    {
        input[i].style.borderBottom = "solid 3px #00415f";
        input[i].style.backgroundColor = "#7bc6e9";
    }
}
function input_focusOff(i)
{
    var input = document.querySelectorAll(".login form input");

    if (flag) 
    {
        input[i].style.borderBottom = "solid 2px white";
        input[i].style.backgroundColor = "#00415f";
    }
    else 
    {
        input[i].style.borderBottom = "solid 3px #00415f";
        input[i].style.backgroundColor = "white";
    }
}
function toggle_adminMadness(j)
{
    var adminDiv=document.querySelector(".dashboard");
    var extDivs = document.querySelectorAll("#adminInfo");
    var hist=document.querySelector(".history-admin");
    var stats=document.querySelector(".stats");

    if(j<=9)
    {
        if(!slide)
        {
        adminDiv.style.transform = 'translateX(-1270px)';
        extDivs[j].style.visibility = "visible";
        extDivs[j].style.transform= 'translateX(-1000px)';
        slide=true;
        }
        else
        {
        adminDiv.style.transform = 'translateX(0px)';
        hist.style.visibility = "hidden";
        stats.style.visibility="hidden";
        for(var i=0;i<extDivs.length;i++)
        {
            extDivs[i].style.visibility="hidden";
        }
        hist.style.visibility = "hidden";
        stats.style.visibility="hidden";
        extDivs[j].style.visibility = "visible";
        extDivs[j].style.transform = 'translateX(0px)';
        slide = false;
        }
    }
    else if(j==10)
    {
        if(!slide)
        {
        adminDiv.style.transform = 'translateX(-1270px)';
        extDivs[j].style.visibility = "visible";
        extDivs[j].style.transform= 'translateX(-1000px)';
        slide=true;
        }
        else
        {
        adminDiv.style.transform = 'translateX(0px)';
        for(var i=0;i<extDivs.length;i++)
        {
            extDivs[i].style.visibility="hidden";
        }
        stats.style.visibility="hidden";
        hist.style.visibility = "hidden";
        hist.style.visibility = "visible";
        hist.style.transform = 'translateX(0px)';
        slide = false;
        }
    }
    else if(j==11)
    {
        if(!slide)
        {
        adminDiv.style.transform = 'translateX(-1270px)';
        extDivs[j].style.visibility = "visible";
        extDivs[j].style.transform= 'translateX(-1000px)';
        slide=true;
        }
        else
        {
        adminDiv.style.transform = 'translateX(0px)';
        for(var i=0;i<extDivs.length;i++)
        {
            extDivs[i].style.visibility="hidden";
        }
        
        stats.style.visibility="hidden";
        hist.style.visibility = "hidden";
        stats.style.visibility = "visible";
        stats.style.transform = 'translateX(0px)';
        slide = false;
        }
    }
}

function load_dest()
{
   var list=document.querySelectorAll(".reservation select");
   var places = ['Huye', 'Kigali', 'Muhanga', 'Ruhango', 'Nyanza', 'Rusizi'] ;
   from = list[0].value;


   while(list[1].options.length>0)
   {
       list[1].remove(0);
   }
   var opt=document.createElement('option');
   opt.value='Destination';
   opt.innerHTML='Destination';
   list[1].appendChild(opt);
    for (var i = 0; i < places.length; i++) 
    {
        if (places[i] == list[0].value) continue;
        var opt = document.createElement('option');
        opt.value = places[i];
        opt.innerHTML = places[i];
        list[1].appendChild(opt);
    }
   
}
function load_time()
{
    var list = document.querySelectorAll(".reservation select");
    var button = document.querySelector(".buttonReserve");
    var timeHrs=4;
    var timeMin=0;
    var timeMax=23;
    var d=new Date();
    var now=d.getHours();
    var hrsDisplay;
    var minDisplay;

    timeHrs = now;
    while (list[2].options.length > 0) 
    {
        list[2].remove(0);
    }
    if (now>timeMax) 
    {
        var opt = document.createElement('option');
        opt.value = '[CLOSED]';
        opt.innerHTML = '[CLOSED]';
        list[2].appendChild(opt);
        button.disabled=true;
        button.style.cursor="not-allowed";
    }
    else
    {
        var opt = document.createElement('option');
        opt.value = 'Depart time';
        opt.innerHTML = 'Depart time';
        list[2].appendChild(opt);
        button.disabled = false;
        for (var i = timeHrs; i <= timeMax; i++) 
        {
            if (i < 10) 
            {
                hrsDisplay = '0' + i;
            }
            else 
            {
                hrsDisplay = i;
            }
            for (var j = timeMin; j < 60; j += 15) 
            {
                if (j < 10) {
                    minDisplay = '0' + j;
                }
                else 
                {
                    minDisplay = j;
                }
                var opt = document.createElement('option');
                opt.value = hrsDisplay + ':' + minDisplay;
                opt.innerHTML = hrsDisplay + ':' + minDisplay;
                list[2].appendChild(opt);
            }
        }
    }
}
function toggle_settings()
{
    var popSettings=document.querySelector(".user-settings");

    if(!settings_slide)
    {
       popSettings.style.transform = "translateY(-360px)";
       settings_slide=true;
    }
    else
    {   
        popSettings.style.transform = "translateY(0px)";
        settings_slide=false;
    }
    
}
function toggle_update()
{
    var homepage=document.querySelector(".homepage");
    var update=document.querySelector(".acc-update");
    var notifier=document.querySelector(".acc-notifier");
    var tickets=document.querySelector(".acc-tickets");
    var history=document.querySelector(".acc-history");
    var accDelete = document.querySelector(".acc-delete");
    
    if(!updateFlag)
    {
        homepage.style.visibility="hidden";
        update.style.visibility="visible";
        notifier.style.visibility="hidden";
        tickets.style.visibility="hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        updateFlag=true;
        notifierFlag=false;
        ticketsFlag=false;
        historyFlag = false;
        delFlag = false;

    }
    else
    {
        homepage.style.visibility="visible";
        update.style.visibility="hidden";
        notifier.style.visibility="hidden";
        tickets.style.visibility="hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        updateFlag=false;
    }
}
function toggle_notifier()
{
    var homepage=document.querySelector(".homepage");
    var update=document.querySelector(".acc-update");
    var notifier=document.querySelector(".acc-notifier");
    var tickets=document.querySelector(".acc-tickets");
    var history = document.querySelector(".acc-history");
    var accDelete = document.querySelector(".acc-delete");
    
    if(!notifierFlag)
    {
        homepage.style.visibility="hidden";
        update.style.visibility="hidden";
        notifier.style.visibility="visible";
        tickets.style.visibility="hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        notifierFlag=true;
        updateFlag=false;
        ticketsFlag=false;
        historyFlag = false;
        delFlag = false;

    }
    else
    {
        homepage.style.visibility="visible";
        update.style.visibility="hidden";
        notifier.style.visibility="hidden";
        tickets.style.visibility="hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        notifierFlag=false;
        
    }
}
function toggle_tickets()
{
    var homepage=document.querySelector(".homepage");
    var update=document.querySelector(".acc-update");
    var notifier=document.querySelector(".acc-notifier");
    var tickets=document.querySelector(".acc-tickets");
    var history = document.querySelector(".acc-history");
    var accDelete = document.querySelector(".acc-delete");
    
    if(!ticketsFlag)
    {
        homepage.style.visibility="hidden";
        update.style.visibility="hidden";
        notifier.style.visibility="hidden";
        tickets.style.visibility="visible";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        ticketsFlag=true;
        updateFlag=false;
        notifierFlag=false;
        historyFlag = false;
        delFlag = false;

    }
    else
    {
        homepage.style.visibility="visible";
        update.style.visibility="hidden";
        notifier.style.visibility="hidden";
        tickets.style.visibility="hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        ticketsFlag=false;
    }
}
function toggle_history()
{
    var homepage=document.querySelector(".homepage");
    var update=document.querySelector(".acc-update");
    var notifier=document.querySelector(".acc-notifier");
    var tickets=document.querySelector(".acc-tickets");
    var history=document.querySelector(".acc-history");
    var accDelete = document.querySelector(".acc-delete");
    
    if(!historyFlag)
    {
        homepage.style.visibility="hidden";
        update.style.visibility="hidden";
        notifier.style.visibility="hidden";
        tickets.style.visibility="hidden";
        history.style.visibility = "visible";
        accDelete.style.visibility = "hidden";
        historyFlag=true;
        ticketsFlag=false;
        updateFlag=false;
        notifierFlag=false;
        delFlag = false;
    }
    else
    {
        homepage.style.visibility="visible";
        update.style.visibility="hidden";
        notifier.style.visibility="hidden";
        tickets.style.visibility="hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        historyFlag=false;
    }
}
function toggle_delete() 
{
    var homepage = document.querySelector(".homepage");
    var update = document.querySelector(".acc-update");
    var notifier = document.querySelector(".acc-notifier");
    var tickets = document.querySelector(".acc-tickets");
    var history = document.querySelector(".acc-history");
    var accDelete = document.querySelector(".acc-delete");

    if (!delFlag) 
    {
        homepage.style.visibility = "hidden";
        update.style.visibility = "hidden";
        notifier.style.visibility = "hidden";
        tickets.style.visibility = "hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility="visible";
        delFlag = true;
        ticketsFlag = false;
        updateFlag = false;
        notifierFlag = false;
    }
    else 
    {
        homepage.style.visibility = "visible";
        update.style.visibility = "hidden";
        notifier.style.visibility = "hidden";
        tickets.style.visibility = "hidden";
        history.style.visibility = "hidden";
        accDelete.style.visibility = "hidden";
        delFlag = false;
    }
}
function displayOptions()
{
   var optionsDiv=document.querySelector(".more-options");
   
   if(!optionsFlag)
   {
    optionsDiv.style.visibility="visible";
    optionsFlag=true;
   }
   else
   {
    optionsDiv.style.visibility="hidden";
    optionsFlag=false;
   }
   
}

