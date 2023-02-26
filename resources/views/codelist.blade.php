<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <style>

@import url("https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap");

* {
    font-family: "Space Grotesk", sans-serif;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
form {
    padding: 10px;
    width: 80%;
    display: flex;
    flex-direction: column;
}
input {
    margin-bottom: 15px;
    padding: 10px 20px;
    border-radius: 3px;
    outline: none;
    border: 1px solid #ddd;
}
h3 {
    margin: 15px 0;
}
button {
    padding: 15px;
    cursor: pointer;
    outline: none;
    background-color: #5d3891;
    border: none;
    color: #f5f5f5;
    font-size: 16px;
    font-weight: bold;
    border-radius: 3px;
}
.app {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 30px;
}
.app > p {
    margin-bottom: 30px;
}
.nestedContainer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}
.companies {
    display: flex;
    flex-direction: column;
    width: 39%;
}
.currentInput {
    width: 95%;
}
#photo {
    width: 50%;
}
#addBtn {
    background-color: green;
    margin-right: 5px;
}
#deleteBtn {
    background-color: red;
}
.container {
    min-height: 100vh;
    padding: 30px;
}
.header {
    width: 80%;
    margin: 0 auto;
    min-height: 10vh;
    background-color: #e8e2e2;
    padding: 30px;
    border-radius: 3px 3px 0 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.resumeTitle {
    opacity: 0.6;
}
.headerTitle {
    margin-bottom: 15px;
}
.resumeImage {
    vertical-align: middle;
    width: 150px;
    height: 150px;
    border-radius: 50%;
}
.resumeBody {
    width: 80%;
    margin: 0 auto;
    padding: 30px;
    min-height: 80vh;
    border: 1px solid #e0e0ea;
}
.resumeBodyTitle {
    margin-bottom: 5px;
}
.resumeBodyContent {
    text-align: justify;
    margin-bottom: 30px;
}
        </style>
    </head>
    <body class="antialiased">
       
        
        <div class='app'>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <h1>Scrap codelist post</h1>
            <form
                method='POST'
                encType='multipart/form-data'
                action="{{ route('make_md') }}"
            >
            @csrf
                <label htmlFor='fullName'>Enter your post url</label>
                <input
                    type='text'
                    required
                    name='url'
                />
                
                <button>CREATE MD File</button>
            </form>
        </div>


    
    </body>
</html>
