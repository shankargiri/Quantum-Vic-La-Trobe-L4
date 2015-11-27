$("#txtSearchPage").keyup(function() {
        var search = $(this).val();
        $(".grid").show();
        if (search)
            $(".grid").not(":containsNoCase(" + search + ")").hide();
});

$.expr[":"].containsNoCase = function (el, i, m) {
    var search = m[3];
    if (!search) return false;
      return new RegExp(search,"i").test($(el).text());
};

