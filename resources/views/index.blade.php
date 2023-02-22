<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

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
            <h1>Resume Builder</h1>
            <p>Generate a resume with ChatGPT in few seconds</p>
            <form
                method='POST'
                encType='multipart/form-data'
                action="{{ route('save') }}"
            >
            @csrf
                <label htmlFor='fullName'>Enter your full name</label>
                <input
                    type='text'
                    required
                    name='fullName'
                    id='fullName'
                />
                <div class='nestedContainer'>
                    <div>
                        <label htmlFor='currentPosition'>Current Position</label>
                        <input
                            type='text'
                            required
                            name='currentPosition'
                            class='currentInput'
                        />
                    </div>
                    <div>
                        <label htmlFor='currentLength'>For how long? (year)</label>
                        <input
                            type='number'
                            required
                            name='currentLength'
                            class='currentInput'
                        />
                    </div>
                    <div>
                        <label htmlFor='currentTechnologies'>Technologies used</label>
                        <input
                            type='text'
                            required
                            name='currentTechnologies'
                            class='currentInput'
                        />
                    </div>
                </div>
                <label htmlFor='photo'>Upload your headshot image</label>
                <input
                    type='file'
                    name='photo'
                    required
                    id='photo'
                    accept='image/x-png,image/jpeg'
                />

            <h3>Companies you've worked at</h3>
                    <div class='nestedContainer' key={index}>
                        <div class='companies'>
                            <label htmlFor='name'>Company Name</label>
                            <input
                                type='text'
                                name='name'
                                required
                            />
                        </div>
                        <div class='companies'>
                            <label htmlFor='position'>Position Held</label>
                            <input
                                type='text'
                                name='position'
                                required
                            />
                        </div>
    
                        <div class='btn__group'>
                                <button id='addBtn' >
                                    Add
                                </button>
                                <button id='deleteBtn' >
                                    Del
                                </button>
                        </div>
                    </div>
    
                <button>CREATE RESUME</button>
            </form>
        </div>


    
    </body>
</html>
