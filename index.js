// Alert info messages
var infoPuzzleType = document.getElementById('puzzle-type-info');
infoPuzzleType.onclick = function(){
    alert('Select the type of puzzle you want to generate. For now, only Sudoku is available');
}

var infoPuzzleType = document.getElementById('span-info');
infoPuzzleType.onclick = function(){
    alert('Select one of the available levels. Every level has 1000 differents puzzles that are randomly put into the generated PDF. Even if you select the same level, puzzles will be differents every time, how cool is that? You can make tons of differents PDF Ebooks.');
}


//Puzzle size text

let puzzleSize = document.getElementById('puzzle-size-text').textContent;

function pageSizeFunction() {
    let pageSize= document.getElementById("pageSize").value;
    console.log('tamaño de puzzle: '+ pageSize);
    if(pageSize === "a5"){
        document.getElementById("puzzle-size-text").innerHTML = 'Puzzle image size = 75 mm';
    } else if (pageSize === "6x9"){
        document.getElementById("puzzle-size-text").innerHTML = 'Puzzle image size = 80 mm';
    } else {
        document.getElementById("puzzle-size-text").innerHTML = 'Puzzle image size = 100 mm';
    }
}