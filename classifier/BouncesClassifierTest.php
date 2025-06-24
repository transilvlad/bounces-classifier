<?php

    /**
     * BouncesClassifierTest
     *
     * Test for BouncesClassifier.
     *
     * @ignore
     *
     * @category   Bounces
     * @package    \bounces
     * @subpackage \classifier\test
     *
     * @version    20141019
     * @since      20141019
     *
     * @author     Vlad Marian
     * @copyright  Vlad Marian 2014
     * @license    http://www.gnu.org/licenses/gpl.txt
     * @link       http://transilvlad.com Author Website
     *
     * @uses       Debug
     * @uses       BouncesClassifier
     */
    abstract class BouncesClassifierTest {
        use Debug;

        /**
         * BouncesClassifierTest::$message
         *
         * Test bounce message.
         */
        static $message = "
Undeliverable: Our home improvements business opportunity

Reporting-MTA: dns;example.internal
Received-From-MTA: dns;MISSD1EXET01.mismta.example.com
Arrival-Date: Fri, 8 Feb 2013 10:42:52 +0000

Final-Recipient: rfc822;john.doe@example.com
Action: failed
Status: 5.1.1
Diagnostic-Code: smtp;550 5.1.1 RESOLVER.ADR.RecipNotFound; not found

Delivery has failed to these recipients or groups:

john.doe@example.com<mailto:john.doe@example.com>
The email address that you entered couldn't be found. Check the address and try resending the message. If the problem continues, please contact your helpdesk.


Diagnostic information for administrators:

Generating server: example.internal

john.doe@example.com
#550 5.1.1 RESOLVER.ADR.RecipNotFound; not found ##

Original message headers:

Received: from MISSD1EXET01.mismta.example.com (127.0.6.200) by
 MISSD1EXHC01.mismta.example.com (127.0.19.19) with Microsoft SMTP Server (TLS) id
 14.2.318.1; Fri, 8 Feb 2013 10:42:52 +0000
Received: from example.com (127.0.169.132) by
 MISSD1EXET01.mismta.example.com (127.0.6.200) with Microsoft SMTP Server id
 14.2.318.1; Fri, 8 Feb 2013 10:43:27 +0000
Received: from mail.example.com (mail.example.com
 [127.0.233.90] (may be forged))       by example.com (8.14.1/8.14..1) with
 SMTP id r18Aglis008269 for <john.doe@example.com>; Fri, 8 Feb 2013
 10:42:48 GMT
DKIM-Signature: v=1; a=rsa-sha1; q=dns/txt; l=12702; s=default;
        t=1360320166; c=relaxed/simple; d=example.com; i=james.doe@example.com;
        h=Subject:From:To:Date:Message-Id:MIME-Version:Content-Type;
        bh=Uq/z2uIZPa5puMsOXWC/eELwrEw=;
        b=aEX+WQDNtafpMjvlLjM3w0/xy7/QudR4AURU0KdxH6E17TNmTLe1SljtyguL3CrpqBrvnsaWhYdv
        dCSDyUPpPyOZ8lbDZuzEqAHadmR/GRjZEwxMkFNXitRngXRJ8ySggQBW7F3a4kGan8wj/V74lZ0J
        +CD+RZkS5CPu9H/mukc=
DomainKey-Signature: a=rsa-sha1; c=nofws; d=example.com; s=default;
        h=Subject:From:To:Date:Message-Id:MIME-Version:Content-Type;
        b=E4BWj8sRgiYXVTvue0W131MmNrGWgPGhmJr/TVU7OeZNKcMhOC93ufIF3Ge/ksnYiPlshU1xcaji
        EuZPzvdWmQsLzOuJfmUPZVbhGe+41JS/0zBqWByRoU5OM64gpM91e2J4ReNPyWknS1ske2K3WeCx
        YMTKdhqMU6Nwk8gVIg4=
Subject: Our home improvements business opportunity
From: James Doe <james.doe@example.com>
To: John Doe <john.doe@example.com>
List-Unsubscribe: <mailto:unsubscribe-gufujbsc@example.com>
Date: Fri, 8 Feb 2013 10:42:46 +0000
Message-ID: <akSsMp7KytakSsMp7Kyt-1360320166@example.com>
X-Mailer: Xmail 3.5.1 (by example.com)
MIME-Version: 1.0
Content-Type: multipart/alternative;
        boundary=\"854a2e0dbec7f25546ff7fc79b7ba966\"
X-ASPIRE-MSW-DEDUPE-IN: TRUE
Return-Path: mailfrom-gufujbsc@example.com
Received-SPF: TempError (MISSD1EXET01.mismta.example.com: error in processing
 during lookup of james.doe@example.com: DNS timeout)
";

        /**
         * BouncesClassifierTest::test()
         *
         * Test classifier.
         *
         * @param bool $content
         */
        static function test($content = false) {
            $content = !empty($content) && is_string($content) ? $content : self::$message;
            $bounces = BouncesClassifier::classify($content);
            self::dump([$bounces, $content]);
        }
    }
