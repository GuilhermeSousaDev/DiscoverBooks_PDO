function next() {
    const con = document.querySelector('.recomended')
    console.log(con.scrollLeft == 0)
    if(con.scrollLeft >= 0) {
        con.scrollLeft += 700
    }
}
function prev() {
    const con = document.querySelector('.recomended')
    if(con.scrollLeft >= 0) {
        con.scrollLeft -= 700
    }
}
function nextB() {
    const con = document.querySelector('.terror')
    if(con.scrollLeft >= 0) {
        con.scrollLeft += 700
    }
}
function prevB() {
    const con = document.querySelector('.terror')
    if(con.scrollLeft >= 0) {
        con.scrollLeft -= 700
    }
}
function nextC() {
    const con = document.querySelector('.romance')
    if(con.scrollLeft >= 0) {
        con.scrollLeft += 700
    }
}
function prevC() {
    const con = document.querySelector('.romance')
    if(con.scrollLeft >= 0) {
        con.scrollLeft -= 700
    }
}
function nextD() {
    const con = document.querySelector('.adventure')
    if(con.scrollLeft >= 0) {
        con.scrollLeft += 700
    }
}
function prevD() {
    const con = document.querySelector('.adventure')
    if(con.scrollLeft >= 0) {
        con.scrollLeft -= 700
    }
}
function nextE() {
    const con = document.querySelector('.drama')
    if(con.scrollLeft >= 0) {
        con.scrollLeft += 700
    }
}
function prevE() {
    const con = document.querySelector('.drama')
    if(con.scrollLeft >= 0) {
        con.scrollLeft -= 700
    }
}