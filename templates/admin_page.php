<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<script type="text/javascript">
/**

*/
    function getBaseUrl() {
        var re = new RegExp(/^.*\//);
        return re.exec(window.location.href)[0];
    }

    function exit(){
        var x = new XMLHttpRequest();
        var url = getBaseUrl() + 'ajax?action=exit';
        document.getElementById('exit').innerHTML = 'processing...';
        x.onload = function() {
            window.location.replace(getBaseUrl().slice(0,  -1));
        };
        x.open('GET', url, true);
        x.send();
    }
/**

*/
</script>
    <button onclick="exit()" id="exit">Exit</button>
    <div id="textt"></div>
</body>
</html>