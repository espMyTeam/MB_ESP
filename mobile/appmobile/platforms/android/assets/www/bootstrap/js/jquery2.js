$('body').on('click', '#button', function (e) {
    e.preventDefault();

    //position of the effect menu
    var positionOfEffectMenu = $("#positionOfEffectMenu").val();

    //gets the value of whether or not the content slide to the new position
    //true if it did, false if it returned back to the original position
    var didContentSlide = $("#didContentSlide").val();

    //starting position of everything, capture the current state at this point
    //this is the page load set up
    if (positionOfEffectMenu == "") {
        //mimic the behavior of md-col-4 (33.333333% of screen)
        $("#positionOfEffect").val((($(".row").width() * 0.33333333)));
        $("#didContentSlide").val(false);
        positionOfEffectMenu = $("#positionOfEffectMenu").val();
        didContentSlide = $("#didContentSlide").val();
    }

    /**
     *   How far we want the transition to occur for the sliding content.
     *   The divided by 2 means, we're only going to be moving half the 
     *   distance of the menu's width while the menu disappears.
     *   In my page, this makes a very space-friendly behavior
     *   originally the menu is all the way to the far right, and I have content
     *   next to it if I'm bringing the menu out, I dont want the content 
     *   page to swing all the way to where the menu is, I want it to move
     *   just a bit so that it can fill up the space and look good for the user
     *   to focus in on.
     */
    positionOfEffect = parseFloat(positionOfEffectMenu) / 2;
    didContentSlide = didContentSlide == "true"; //turns string to bool value

    //I disable my button as its sliding otherwise if the user frantically clicks
    //it will intercept the positions and hijack the animation
    //it gets re-enabled later in this code
    var $elt = $(this).attr('disabled', true);

    //begin the animation

    //Now.. move the effect content to the new position
    //or if it is already at the new position, move it back to where it was before
    $("#effectContent").animate({
        left: (!didContentSlide) ? "-=" + (positionOfEffect) + "px" : "+=" + (positionOfEffect) + "px"
    }, 500, function () {

    })
    //as the content is going in, drop the effectMenu out of the page
    //or if the content is going back out, bring the effectMenu into the page
    .queue(function () {
        $("#effectMenu").toggle("drop", {}, 500);
    }).dequeue();

    //this is for the button.. its re-enabled when everything stops moving
    setTimeout(function () {
        $elt.attr('disabled', false);
    }, 500);

    //update the value of whether or not the contents slid into the new position
    didContentSlide = (!didContentSlide);
    $("#didContentSlide").val(didContentSlide);

    //override the defaults of the button
    return false;
});