<div class="struc">
    <div class="folder">
        <b>project</b>
        <div class="file"><b>composer.json</b> (use 'composer update' to import library for env file and email)</div>
        <div class="file"><b>.env</b> (ENV file with variables, it is invisible)</div>
        <div class="file"><b>istructions</b> (there are the istructions for start project)</div>
        
        <div class="folder">
            <b>public</b>
            <div class="file"><b>index.php</b> (here you set all meta data and require the main page.php)</div>
            <div class="file"><b>page.php</b> (it's the main ehwrw you require all other pages)</div>
            <div class='file'><b>components.php</b> (here there are html code of javascript elements for this framework)</div>
            <div class='file'><b>fram.css</b> (Here there are css of js components)</div>
            <div class='file'><b>style.css</b> (Css code of thoose pages)</div>
        </div>

        <div class="folder">
            <b>src</b>
            <div class="file"><b>common_file.php</b> (here there are all functions of encrypt, decrypt and )</div>
            <div class="file"><b>dbfunctions.php</b> (database functions)</div>
            <div class="file"><b>functions</b> (here there are some functions that you can use anywjere into your php code)</div>
            <div class='folder'>
                <b>footer</b>
                <div class='file'>(here you must write footers of your pages and require them into public/page.php)</div>
            </div>
            <div class='folder'>
                <b>header</b>
                <div class='file'>(here you must write headers of your pages and require them into public/page.php)</div>
            </div>
            <div class='folder'>
                <b>pages</b>
                <div class='file'>(here you must write pages of your project and require them into public/page.php)</div>
            </div>
        </div>
    </div>

</div>