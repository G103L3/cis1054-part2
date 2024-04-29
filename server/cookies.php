<?php
/**
 * cookies
 *
 * @author Gioele Giunta
 * @version 1.0
 * @since 2023-04-29
 * @info Me (Gioele) am going to use the SNAKE_CASE for the php files
 */

class Cookies
{
    /**
     * Checks if cookies are allowed.
     *
     * @return bool True if cookies are allowed, false otherwise.
     */
    public static function cookies_allowed()
    {
        // Check if the "cookieAllow" cookie is set
        return isset($_COOKIE['cookieAllow']) && $_COOKIE['cookieAllow'] === 'true';
    }

    /**
     * Checks if the user is authenticated in cookies.
     *
     * @return bool True if the user is authenticated, false otherwise.
     */
    public static function is_authenticated()
    {
        // Check if the email and password are present in the cookies
        return (isset($_COOKIE['email']) && isset($_COOKIE['password']));
    }

    /**
     * Saves data to the cookies.
     *
     * @param array $data An associative array with keys as the cookie names and values as the corresponding values.
     */
    public static function save_data(array $data)
    {
        // Check if cookies are allowed
        if (!self::cookies_allowed()) {
            return;
        }

        // Set the cookie expiration time to 6 months from now
        $expiration = time() + (6 * 30 * 24 * 60 * 60); // 6 months

        // Save the data to cookies
        foreach ($data as $key => $value) {
            setcookie($key, $value, $expiration, '/');
        }
    }
}