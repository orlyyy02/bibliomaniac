<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="userhome.css">
    </head>
    <body>
        <div class="header"><p>Bibliophile<p>
            <a href="" class="cartButton"><img class="cartImage" src="cart.png"></a>
            <p class="profile">Profile</p>
        </div>
        </br>
            <div class="divSelfHelp">
                <button class="SelfHelp"><h1>Self Help<h1></button>
                <table class="tableSelfHelp">
                    <tr>
                        <td>
                            <img class="genre1" src="book1.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre1" src="book2.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre1" src="book3.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre1" src="book4.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre1" src="book5.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre1" src="book6.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre1" src="book7.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                    </tr>
                    <tr>
                        <td class="title">Atomic Habits</td>
                        <td class="title">The Subtle Art of Not Giving a F*ck</td>
                        <td class="title">Everything is F*cked</td>
                        <td class="title">Why Men Love Bitches</td>
                        <td class="title">How to Help Yourself</td>
                        <td class="title">Declutter Your Mind</td>
                        <td class="title">Ikigai</td>
                    </tr>
                    <tr>
                        <td class="price">₱249.00</td>
                        <td class="price">₱149.00</td>
                        <td class="price">₱149.00</td>
                        <td class="price">₱499.00</td>
                        <td class="price">₱199.00</td>
                        <td class="price">₱179.00</td>
                        <td class="price">₱290.00</td>
                    </tr>
                </table>
            </div>
            </br>
            <div class="divThriller">
                <button class="thriller"><h1>Thriller<h1></button>
                <table class="tableTriller">
                    <tr>
                        <td>
                            <img class="genre2" src="book8.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre2" src="book9.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre2" src="book10.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre2" src="book11.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre2" src="book12.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre2" src="book13.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                        <td>
                            <img class="genre2" src="book14.jpg" onmouseout="out(this)" onmouseover="over(this)">
                        </td>
                    </tr>
                    <tr>
                        <td class="title">The Perfect Son</td>
                        <td class="title">Married to a Stranger</td>
                        <td class="title">One by One</td>
                        <td class="title">The Accident</td>
                        <td class="title">My Daughter's Secret</td>
                        <td class="title">214 Palmer Street</td>
                        <td class="title">The Niece</td>
                    </tr>
                    <tr>
                        <td class="price">₱149.00</td>
                        <td class="price">₱199.00</td>
                        <td class="price">₱129.00</td>
                        <td class="price">₱299.00</td>
                        <td class="price">₱249.00</td>
                        <td class="price">₱159.00</td>
                        <td class="price">₱280.00</td>
                    </tr>
                </table>
            </div>
    <script>
    function over(x){
      x.style.height="270px";
      x.style.width="190px";
    }
    function out(x){
      x.style.height="220px";
      x.style.width="150px";
    }
    </script>
    </body>
</html>