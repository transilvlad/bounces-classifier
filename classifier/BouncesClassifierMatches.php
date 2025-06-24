<?php

    /**
     * BouncesClassifierMatches
     *
     * Bounces reasons matches database.
     *
     * @filesource
     *
     * @category   Bounces
     * @package    \bounces
     * @subpackage \classifier\matches
     *
     * @version    20141019
     * @since      20141019
     *
     * @author     Vlad Marian
     * @copyright  Vlad Marian 2014
     * @license    http://www.gnu.org/licenses/gpl.txt
     * @link       http://transilvlad.com Author Website
     */
    abstract class BouncesClassifierMatches {

        /**
         * BouncesClassifierMatches::$friendly
         *
         * List of friendly bounce messages codes translation.
         */
        static $friendly = [
            40 => "Greylisted",
            41 => "All ports are busy",
            42 => "Temporarly limited",
            43 => "SPF/DKIM failure",
            44 => "No size parameter",
            45 => "Source error",
            46 => "Local error",
            47 => "Connection time",
            50 => "Address invalid",
            51 => "Blacklisted",
            52 => "Content rejected",
            53 => "Command unrecognized",
            54 => "Domain not local",
            55 => "Quota issue",
            56 => "Domain blacklisted",
            57 => "rDNS not found",
            58 => "Non compliant",
            59 => "Invalid MX",
            60 => "Redirect loop",
            61 => "Action required",
            62 => "Notification",
            63 => "Not safe-listed",
            64 => "DMARC Report",
            65 => "Access denied to maillist",
            66 => "Blocked forwarding server",
            67 => "Blocked by user"
        ];

        /**
         * BouncesClassifierMatches::$matches
         *
         * List of bounce messages matches and codes.
         */
        static $matches = [
            [40, "temporary greylist embargoed"], [40, "greylisting in action"], [40, "has been greylisted"], [40, "grey bounce"], [40, "graylisted"], [40, "graylist"],

            [41, "prevents additional messages from being delivered"], [41, "resources temporarily unavailable"], [41, "service temporarily unavailable"], [41, "error while writing spool file"], [41, "temporary policy rejection"], [41, "receiving mail too quickly"], [41, "all server ports are busy"], [41, "connection limit exceeded"], [41, "local error in processing"], [41, "not accepting connections"], [41, "trouble in home directory"], [41, "temporarily unavailable"], [41, "service not available"], [41, "deferring connection"], [41, "temporarily deferred"], [41, "service unavailable"], [41, "temporarily refused"], [41, "please retry later"], [41, "temporary problem"], [41, "message rejected"], [41, "please try again"], [41, "come back later"], [41, "try again later"], [41, "ports are busy"], [41, "internal error"], [41, "451 timeout"], [41, "overloaded"], [41, "try later"], [41, "too busy"], [41, "too many"],

            [42, "mailbox temporarily disabled"], [42, "max defers"], [42, "550 4.2.1"], [42, "temporary"], [42, "421dynt1"], [42, "deferred"],

            [43, "message body does not hash to bh value"], [43, "(pra) not permitted"], [43, "refused due to provided dmarc policy"], [43, "message failed dmarc evaluation"], [43, "spf/dkim authentication-failure"], [43, "feedback-type: auth-failure"], [43, "is not allowed to send mail"], [43, "invalid sender: spf_fail"], [43, "authentication-failure"], [43, "sigature verify error"], [43, "mfrom;identity"], [43, "dkim=neutral"], [43, "openspf.net"], [43, "domainkeys"], [43, "sender id"], [43, "550 5.7.1"],

            [44, "501 no size parameter sent"], [44, "no size parameter sent"], [44, "size parameter"], [44, "status: 5.5.0"], [44, "no size"],

            [45, "from is not a valid email address"], [45, "rejected after data"], [45, "failing address"], [45, "missing at"],

            [46, "insufficient system resources"], [46, "server configuration problem"], [46, "451 temporary local problem"], [46, "retry timeout exceeded"], [46, "5.1.0 error: r4.1"], [46, "tls not available"], [46, "please try later"], [46, "local problem"],

            [47, "exceeded allowable connection time"], [47, "timeout waiting for client input"], [47, "delivery temporarily suspended"], [47, "connection timed out"], [47, "timeout exceeded"], [47, "command timeout"], [47, "status: 4.4.1"], [47, "arrival-date"], [47, "connect to"],

            [50, "the email account that you tried to reach does not exist"], [50, "double-checking the recipient's email address for typos"], [50, "exchange defender does not protect this email address"], [50, "email account that you tried to reach does no exists"], [50, "email account that you tried to reach is disabled"], [50, "delivery to the following recipients failed"], [50, "this message has been in the queue too long"], [50, "mailbox has been blocked due to inactivity"], [50, "this address no longer accepts mail"], [50, "rcpt account isn't a local account"], [50, "failed to read response template"], [50, "recipient address does not exist"], [50, "account or domain may not exist"], [50, "message has not been collected"], [50, "no such person at this address"], [50, "host or domain name not found"], [50, "recipient no longer on server"], [50, "no mailbox here by that name"], [50, "persistent transient failure"], [50, "the recipient does not exist"], [50, "mailbox currently suspended"], [50, "user account is unavailable"], [50, "550 5.1.1 not our customer"], [50, "is not handled by this mta"], [50, "persistent transient error"], [50, "recipient address rejected"], [50, "could not deliver mail to"], [50, "account has been disabled"], [50, "administratively disabled"], [50, "no such file or directory"], [50, "retrying will not succeed"], [50, "transient delivery errors"], [50, "mailbox is not available"], [50, "disabled or discontinued"], [50, "domain has been disabled"], [50, "email address is unknown"], [50, "this user doesn't have a"], [50, "unknown or illegal alias"], [50, "cannot receive new mail"], [50, "5.1.0 address rejected"], [50, "cannot add to sender"], [50, "computer is turned off"], [50, "folder creation failed"], [50, "read response template"], [50, "wasn't able to deliver"], [50, "account not available"], [50, "delivery time expired"], [50, "destinataire invalide"], [50, "local delivery failed"], [50, "mailbox not available"], [50, "unknown email address"], [50, "x-postfix; connect to"], [50, "allowed queue period"], [50, "connection timed out"], [50, "could not be reached"], [50, "no smtp service here"], [50, "permanently deferred"], [50, "ultimately generated"], [50, "verify the addresses"], [50, "not a valid mailbox"], [50, "check the recipient"], [50, "deactivated mailbox"], [50, "in domino directory"], [50, "is not a known user"], [50, "in reply to rcpt to"], [50, "long failure period"], [50, "account is disabled"], [50, "mailbox is disabled"], [50, "mailbox is inactive"], [50, "mailbox unavailable"], [50, "no valid recipients"], [50, "recipient not known"], [50, "unrouteable address"], [50, "undisclosed address"], [50, "5.1.1 resolver.adr"], [50, "failed permanently"], [50, "name service error"], [50, "no mx or a records"], [50, "recipient rejected"], [50, "account suspended"], [50, "couldn't be found"], [50, "file or directory"], [50, "is not responding"], [50, "invalid recipient"], [50, "recipient unknown"], [50, "recipients failed"], [50, "no such recipient"], [50, "response template"], [50, "unknown recipient"], [50, "unable to deliver"], [50, "user doesn't have"], [50, "unable to deliver"], [50, "no longer in use"], [50, "... user unknown"], [50, "account inactive"], [50, "account disabled"], [50, "address rejected"], [50, "failed recipient"], [50, "error on maildir"], [50, "user is unknown"], [50, "invalid address"], [50, "invalid mailbox"], [50, "message expired"], [50, "message too old"], [50, "no such account"], [50, "no mailbox here"], [50, "pipe to |/home/"], [50, "unknown address"], [50, "unknown account"], [50, "user not exist"], [50, "does not exist"], [50, "failed to read"], [50, "host not found"], [50, "user not found"], [50, "access denied"], [50, "changed email"], [50, "expired email"], [50, "inactive user"], [50, "many failures"], [50, "not listed in"], [50, "not reachable"], [50, "status: 4.0.0"], [50, "status: 4.4.1"], [50, "status: 5.0.0"], [50, "status: 5.1.1"], [50, "status: 5.4.7"], [50, "status: 5.5.0"], [50, "user disabled"], [50, "queue.expired"], [50, "recipnotfound"], [50, "discontinued"], [50, "for too long"], [50, "no such user"], [50, "no such file"], [50, "unknown user"], [50, "user unknown"], [50, "unknown, see"], [50, "550 (#5.1.1)"], [50, "550 no such"], [50, "ve given up"], [50, "unrouteable"], [50, "unreachable"], [50, "after rcpt"], [50, "has closed"], [50, "no mailbox"], [50, "not in use"], [50, "550 5.5.0"], [50, "no longer"], [50, "not found"], [50, "timed out"], [50, "inactivo"], [50, "realying"], [50, "30 days"], [50, "no such"],

            [51, "provide the above transaction id and email details to"], [51, "does not want to receive mail from your address"], [51, "http://postmaster.timico.net/faq.html#bl1"], [51, "you are not allowed to send mail"], [51, "administrative prohibition"], [51, "email has been rejected"], [51, "found on one or more"], [51, "transaction rejected"], [51, "5.7.1 access denied"], [51, "blocked for abuse"], [51, '5.2.1 "tempfail"'], [51, "denied by policy"], [51, "poor reputation"], [51, "sender rejected"], [51, "user complaints"], [51, "cloudmark.com"], [51, "sender denied"], [51, "550 rejected"], [51, "rule imposed"], [51, "ase reports"], [51, "comcast.net"], [51, "554 denied"], [51, "blacklist"], [51, "blocked"], [51, "csi rbl"], [51, "con:b1"], [51, "rp:rdn"], [51, "5.7.1"], [51, "abuse"], [51, "dnsbl"], [51, "571"],

            [52, "mail appears to be unsolicited"], [52, "bulk email senders guidelines"], [52, "other mail system problem 552"], [52, "to reduce the amount of spam"], [52, "rejected by content scanner"], [52, "automated process detected"], [52, "appears to be unsolicited"], [52, "content judged to be spam"], [52, "message has been blocked"], [52, "rejecting banned content"], [52, "likely unsolicited mail"], [52, "spam message rejected"], [52, "content restrictions"], [52, "sender verify failed"], [52, "content unacceptable"], [52, "mail content denied"], [52, "blocked because ase"], [52, "unsolicited content"], [52, "rejected as spam by"], [52, "571 message refused"], [52, "554 message refused"], [52, "554 email rejected"], [52, "reports it as spam"], [52, "spam sent to gmail"], [52, "content filtering"], [52, "content rejected"], [52, "spam not welcome"], [52, "blocked address"], [52, "content scanner"], [52, "considered spam"], [52, "embedded images"], [52, "invalid content"], [52, "message blocked"], [52, "rejected due to"], [52, "(mode: normal)"], [52, "cmae prefilter"], [52, "5.7.0 blocked"], [52, "status: 5.7.0"], [52, "status: 5.7.1"], [52, "spam assassin"], [52, "spam detected"], [52, "spam content"], [52, "spamassassin"], [52, "571 message"], [52, "552 5.2.0"], [52, "assassin"], [52, "rejected"], [52, "refused"], [52, "denied"], [52, "(cmae)"],

            [53, "no from and/or date header given"], [53, "message is not rfc compliant"], [53, "bad sequence of commands"], [53, "command unrecognized"], [53, "rfc compliant"], [53, "header given"], [53, "precede data"], [53, "valid rcpt"], [53, "rfc 2822"],

            [54, "all relevant mx records point to non-existent hosts"], [54, "that domain isn't in my list of allowed rcpthosts"], [54, "does not resolve or mail not configured"], [54, "530 5.7.1 client was not authenticated"], [54, "domain isn't allowed to be relayed"], [54, "no such domain at this location"], [54, "no such domain at this location"], [54, "can't add to recipient domain"], [54, "host not found, try again"], [54, "550 5.7.1 unable to relay"], [54, "non-local e-mail address"], [54, "not permitted to relay"], [54, "relaying not permitted"], [54, "relayed thru this mta"], [54, "domain name not found"], [54, "mail not configured"], [54, "relay access denied"], [54, "relay not permitted"], [54, "not authenticated"], [54, "not accepted here"], [54, "not our customer"], [54, "not hosted here"], [54, "possibly forged"], [54, "relaying denied"], [54, "relaying denied"], [54, "unable to relay"], [54, "authentication"], [54, "domain is not"], [54, "domain isn't"], [54, "550 5.7.1"], [54, "non-local"], [54, "relay"],

            [55, "the above email address has exceeded their mailbox"], [55, "message exceeded maximum message size allowed"], [55, "message is larger than the space available"], [55, "space available in the user's mailfolder"], [55, "mailbox message count quota exceeded"], [55, "insufficient mailbox storage"], [55, "mailbox exceeds allowed size"], [55, "insufficient system storage"], [55, "mailbox size limit exceeded"], [55, "message would exceed quota"], [55, "full for for several days"], [55, "mailbox is currently full"], [55, "user account is overquota"], [55, "mailbox for user is full"], [55, "message receiving limit"], [55, "sorry, this mailbox is"], [55, "mailbox quota exceeded"], [55, "retry timeout exceeded"], [55, "amount exceed mailbox"], [55, "mailbox has been full"], [55, "maildir has overdrawn"], [55, "address has exceeded"], [55, "allowed mailbox size"], [55, "can't create output"], [55, "mail quota exceeded"], [55, "recipient overquota"], [55, "mailfolder is full"], [55, "storage allocation"], [55, "maildir over quota"], [55, "user is over quota"], [55, "message is larger"], [55, "out of disk space"], [55, "delivery attempt"], [55, "over the maximum"], [55, "user output file"], [55, "full, please try"], [55, "allowed mailbox"], [55, "mailbox exceeds"], [55, "mailbox is full"], [55, "mailbox quota"], [55, "diskspace quota"], [55, "this mailbox is"], [55, "quota exceeded"], [55, "is over quota"], [55, "status: 4.0.0"], [55, "status: 4.2.2"], [55, "status: 5.0.0"], [55, "status: 5.1.1"], [55, "status: 5.2.2"], [55, "status: 5.2.3"], [55, "allowed size"], [55, "exceed quota"], [55, "mailbox disk"], [55, "mailbox full"], [55, "mailbox size"], [55, "user is over"], [55, "no diskspace"], [55, "answer=6558"], [55, "mailfolder"], [55, "mail quota"], [55, "over quota"], [55, "overquota"], [55, "452 4.2.2"], [55, "is full"], [55, "mailbox"], [55, "exceed"], [55, "quota"],

            [56, "we do not accept mail from this address"], [56, "cannot find your hostname"], [56, "couldn't find any host"], [56, "client host rejected"], [56, "host named"],

            [57, "lowest numbered mx record points to local host"], [57, "inconsistent or no dns ptr"], [57, "unable to contact dns"], [57, "not verified in dns"], [57, "does not resolve"], [57, "ip must resolve"], [57, "reverse dns"], [57, "rdns"],

            [58, "501 syntax error"], [58, "line too long"],

            [59, "invalid mx"],

            [60, "address generates mail loop"], [60, "loops back to myself"], [60, "possible mail loop"], [60, "hop count exceeded"], [60, "554 too many hops"], [60, "queue too long"], [60, "550 mail loop"], [60, "loop detected"], [60, "status: 5.4.6"], [60, "too many hops"], [60, "hops 20 (20)"], [60, "loops back"], [60, "mail loop"], [60, "554 5.4.6"], [60, "redirect"], [60, "554-"],

            [61, "follow instructions"], [61, "click on this link"], [61, "end email overload"], [61, "been redirected"], [61, "status: 4.7.0"], [61, "pre-approved"], [61, "link below"], [61, "click "],

            [62, "has not been delivered to the recipient's"], [62, "blackberry handheld"], [62, "status: 5.0.0"],

            [62, "dkim and domainkeys results"], [62, "summary of results"], [62, "spf check details"], [62, "original email"],

            [62, "warning: message still undelivered"], [62, "email is of an urgent nature"], [62, "not currently in the office"], [62, "will respond to you within"], [62, "thanks you for the email"], [62, "in line for collection"], [62, "this is a warning only"], [62, "will keep trying until"], [62, "thanks for your e-mail"], [62, "soon as it is possible"], [62, "do not need to resend"], [62, "no action is required"], [62, "urgent please contact"], [62, "your message in line"], [62, "not be able to reply"], [62, "forward your message"], [62, "as soon as possible"], [62, "unavailable to read"], [62, "has been delivered"], [62, "thank you for your"], [62, "as soon as we can"], [62, "not able to reply"], [62, "out of the office"], [62, "vacation response"], [62, "working remotely"], [62, "please re-direct"], [62, "access to email"], [62, "action: delayed"], [62, "automatic reply"], [62, "automated reply"], [62, "continue to try"], [62, "i am away until"], [62, "message delayed"], [62, "thanks for your"], [62, "transport error"], [62, "will be retried"], [62, "not here today"], [62, "please forward"], [62, "be contactable"], [62, "auto-response"], [62, "for the email"], [62, "i am not here"], [62, "out of office"], [62, "status: 4.5.0"], [62, "status: 4.4.1"], [62, "we are closed"], [62, "working hours"], [62, "annual leave"], [62, "easter break"], [62, "soon as time"], [62, "unknown mail"], [62, "not respond"], [62, "on vacation"], [62, " has left "], [62, "auto reply"], [62, "my absence"], [62, "thanks you"], [62, "work hours"], [62, "am now on"], [62, "maternity"], [62, "my return"], [62, "i'm here"], [62, "24 hours"], [62, "auto:"],

            [63, "specific email addresses"], [63, "sender not pre-approved"], [63, "not accepting any email"], [63, "follow instructions"], [63, "recipient directly"], [63, "only accepting"],

            [64, "report domain: "],

            [65, "post messages to the group"], [65, "rejected by google groups"], [65, "that the group you tried"], [65, "hl=en&answer=188131"], [65, "failed permanently"], [65, "groups. please"],

            [66, "status: 5.0.0 (permanent failure)"], [66, "internet service provider since"], [66, "network is on our block list"], [66, "bay0-mc4-f37"],

            [67, "blocked by the recipient"], [67, "you have been blocked"],
        ];
    }
