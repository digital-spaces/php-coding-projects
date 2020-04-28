        </main>

        <footer>
            <!--
            This is an example of using PHP's shorthand tag. The shorthand tag replaces
            the word 'echo'. 
            -->
            <?php
              if (strpbrk($breadcrumb, "/")) {
                $breadcrumbDisplay = substr($breadcrumb, strrpos($breadcrumb, "/")+1);
              } else {
                $breadcrumbDisplay = $breadcrumb;
              }
              echo "<small>Go back to <a href='$breadcrumb'>".$breadcrumbDisplay."</a>.</small>";
            ?>
        </footer>
    </body>
</html>