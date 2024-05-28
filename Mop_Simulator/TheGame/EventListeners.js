window.addEventListener('keydown',(event) =>
{
    if (felmoso.preventInput) return
    switch (event.key)
    {
        case 'w': //up
        case 'ArrowUp':
            keys.w.pressed =true;
            break;

        case 's': //down
        case 'ArrowDown':
            keys.s.pressed =true;
            break;

        case 'a': //left
        case 'ArrowLeft':
            keys.a.pressed =true;
            break;

        case 'd': //right
        case 'ArrowRight':
            keys.d.pressed =true;
            break;
    }
})

window.addEventListener('keyup',(event) =>
{
    switch (event.key)
    {
        case 'a': //left
        case 'ArrowLeft':
            keys.a.pressed = false;
            break;

        case 'd': //right
        case 'ArrowRight':
            keys.d.pressed = false;
            break;

        case 'w': //up
        case 'ArrowUp':
            keys.w.pressed =false;
            break;

        case 's': //down
        case 'ArrowDown':
            keys.s.pressed =false;
            break;

    }
})