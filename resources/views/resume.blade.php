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
            
    <button onClick={handlePrint}>Print Page</button>
			<main className='container' ref={componentRef}>
				<header className='header'>
					<div>
						<h1>{result.fullName}</h1>
						<p className='resumeTitle headerTitle'>
							{result.currentPosition} ({result.currentTechnologies})
						</p>
						<p className='resumeTitle'>
							{result.currentLength}year(s) work experience
						</p>
					</div>
					<div>
						<img
							src={result.image_url}
							alt={result.fullName}
							className='resumeImage'
						/>
					</div>
				</header>
				<div className='resumeBody'>
					<div>
						<h2 className='resumeBodyTitle'>PROFILE SUMMARY</h2>
						<p
							dangerouslySetInnerHTML={{
								__html: replaceWithBr(result.objective),
							}}
							className='resumeBodyContent'
						/>
					</div>
					<div>
						<h2 className='resumeBodyTitle'>WORK HISTORY</h2>
						{result.workHistory.map((work) => (
							<p className='resumeBodyContent' key={work.name}>
								<span style={{ fontWeight: "bold" }}>{work.name}</span> -{" "}
								{work.position}
							</p>
						))}
					</div>
					<div>
						<h2 className='resumeBodyTitle'>JOB PROFILE</h2>
						<p
							dangerouslySetInnerHTML={{
								__html: replaceWithBr(result.jobResponsibilities),
							}}
							className='resumeBodyContent'
						/>
					</div>
					<div>
						<h2 className='resumeBodyTitle'>JOB RESPONSIBILITIES</h2>
						<p
							dangerouslySetInnerHTML={{
								__html: replaceWithBr(result.keypoints),
							}}
							className='resumeBodyContent'
						/>
					</div>
				</div>
			</main>
    
    
        </div>


    
    </body>
</html>
