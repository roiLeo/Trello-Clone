/**
 * Created by Utilisateur on 13/03/2017.
 */
$(document).on('click', '.card-header span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('collapsed')) {
        $this.parents('.card').find('.card-block').slideUp();
        $this.addClass('collapsed');
        $this.find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    } else {
        $this.parents('.card').find('.card-block').slideDown();
        $this.removeClass('collapsed');
        $this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }
})