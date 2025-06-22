<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FootballApiService;
use Exception;

class ChatController extends Controller
{
    // Function to calculate Levenshtein distance (string similarity)
    public function calculateLevenshtein($string1, $string2)
    {
        return levenshtein($string1, $string2);
    }

    // Function to normalize singular/plural forms
    public function normalizeWord($word)
    {
        // Simple pluralization rule: Remove 's' if it's plural (this handles most cases)
        if (substr($word, -1) === 's') {
            return substr($word, 0, -1);  // Remove the 's' for plural to get singular form
        }
        return $word;
    }

    public function chat(Request $request)
    {
        // Validate incoming message
        $request->validate([
            'message' => 'required|string',
        ]);

        // List of football-related keywords and corresponding answers
        $footballKeywords = [

            'sarawak united fc' => 'Sarawak United FC is based in the state of Sarawak, known for its passionate support and competitive play in the MSL.',
            'felda united' => 'Felda United FC represents the Federal Land Development Authority (Felda) and has been a strong competitor in the Malaysian Super League.',
            'History' => 'Click on "dashboard" to see a  button history and click.',
            'Teams' => 'Click on "Teams" to see a list of teams participating in the league.',
            'Teams' => 'Click on "Teams" to see a list of teams participating in the league.',
            'Standings' => 'Click on "dashboard" and can see a table standing latest match',
            'NEWS' => 'Click on "NEWS" to stay updated with the latest football news.',
            'FAVOURITE' => 'Click on "FAVOURITE" to select and view your favorite teams and players.',
            'Forum' => 'Click on "Forum" to engage with other football fans and discuss various topics.',
            'Mini Games' => 'Click on "Mini Games" to play fun football-themed games.',
            'Highlights' => 'Click on "Highlights" to watch the latest match highlights.',
            'Predictions' => 'Click on "Predictions" to predict the outcomes of upcoming matches.',
            'Fun Quiz' => 'Click on "Fun Quiz" to take quizzes related to football and test your knowledge.',
            'Live match' => 'Click on "dashboard to view live match',
            'Leaderboard' => 'Click on "Leaderboard" to see the rankings of quiz players and other activities.',
            'Fantasy Team' => 'Click on "Fantasy Team" to create and manage your own fantasy football team.',
            'malaysia best player' => 'Malaysia best player all time Mokhtar Dahari',
            'malaysian super league' => 'The Malaysian Super League (MSL) is the top-tier professional football league in Malaysia, featuring 12 teams competing for the championship each year.',
    'most successful team in msl' => 'Johor Darul Ta\'zim (JDT) is the most successful team in the Malaysian Super League, having won multiple titles.',
    'how many teams in msl' => 'The Malaysian Super League currently features 12 teams, including teams like Johor Darul Ta\'zim, Selangor, and Perak.',
    'malaysian cup' => 'The Malaysian Cup (Piala Malaysia) is a prestigious football tournament in Malaysia, featuring teams from various divisions competing for the title.',
    'malaysian league system' => 'The Malaysian league system is composed of the Malaysian Super League (MSL), the Malaysia Premier League (MPL), and the lower divisions.',
    'top scorers in msl' => 'The top scorers in the Malaysian Super League include players like Norshahrul Idlan Talaha and Guilherme de Paula.',

    'jdt history' => 'Johor Darul Ta\'zim (JDT) is one of the most successful teams in Malaysian football, known for winning multiple MSL titles and international success.',
    'jdt coach' => 'The head coach of Johor Darul Ta\'zim (JDT) is Benjamin Mora.',
    'selangor fc stadium' => 'Selangor FC plays their home games at the Shah Alam Stadium, which has a capacity of 80,000 spectators.',
    'perak fc last msl title' => 'Perak FC last won the Malaysian Super League title in 2004.',
    'kedah darul aman fc players' => 'Kedah Darul Aman FC has several top players like Baddrol Bakhtiar and Sandro Da Silva.',
    'terengganu fc achievements' => 'Terengganu FC has won the Malaysia FA Cup and consistently competes in the top tier of Malaysian football.',
    'pahang fa history' => 'Pahang FA is one of the most successful clubs in Malaysian football, with multiple league and cup titles.',

    'best player in malaysia' => 'The best player in the Malaysian Super League includes players like Safiq Rahim and Norshahrul Idlan Talaha.',
    'safiq rahim achievements' => 'Safiq Rahim is a prominent Malaysian footballer known for his leadership and being a key player in the national team and Johor Darul Ta\'zim (JDT).',
    'norshahrul idlan talaha goals' => 'As of 2021, Norshahrul Idlan Talaha has scored over 100 goals in the Malaysian Super League.',
    'faiz subri puskas' => 'Mohd Faiz Subri is the only Malaysian player to win the FIFA Puskás Award for scoring one of the best goals in football history.',
    'khairul fahmi che mat teams' => 'Khairul Fahmi Che Mat is a legendary Malaysian goalkeeper, playing for Kelantan FA and the national team.',
    'top scorer in malaysian national team' => 'The all-time top scorer for the Malaysian national football team is Norshahrul Idlan Talaha.',

    'next malaysia cup match' => 'The next Malaysia Cup match will be held on [insert date]. Check the fixture for more details.',
    'malaysia world cup qualification' => 'Malaysia has never qualified for the FIFA World Cup but continues to improve through regional competitions like the AFF Championship.',
    'who won the malaysia fa cup in 2020' => 'The Malaysia FA Cup in 2020 was won by Kuala Lumpur City FC.',
    'how many times malaysia won aff championship' => 'Malaysia has won the AFF Championship (formerly known as the Tiger Cup) 2 times, in 1996 and 2010.',
    'malaysian national team fifa ranking' => 'As of 2021, Malaysia is ranked in the 150s in the FIFA World Ranking.',

    'bukit jalil stadium capacity' => 'Bukit Jalil National Stadium has a seating capacity of 87,411 spectators, making it one of the largest stadiums in Southeast Asia.',
    'jdt home stadium' => 'Johor Darul Ta\'zim plays at the Sultan Ibrahim Stadium, which is located in Iskandar Puteri, Johor.',
    'shah alam stadium history' => 'Shah Alam Stadium has hosted numerous major football events and is the home ground of Selangor FC.',
    'malaysia cup final stadium' => 'The Malaysia Cup final is usually held at the Bukit Jalil National Stadium in Kuala Lumpur.',

    'best football player malaysia' => 'The best football player in Malaysia is widely considered to be the legendary Zainal Abidin Hassan, who has had an outstanding career with the national team and Selangor FA.',
    'dollah salleh national team' => 'Dollah Salleh was a key player for the Malaysian national team and later became a coach for the team.',
    'zainal abidin hassan achievements' => 'Zainal Abidin Hassan is one of the most successful footballers in Malaysia, known for his skill and contributions to both Selangor FC and the national team.',
    'khairul fahmi che mat career' => 'Khairul Fahmi Che Mat has played as the goalkeeper for Kelantan FA and the Malaysian national football team.',
    'puskas award malaysia' => 'Mohd Faiz Subri is the only Malaysian player to win the prestigious FIFA Puskás Award in 2016.',

    'malaysian national football team coach' => 'The current head coach of the Malaysian national football team is Tan Cheng Hoe.',
    'malaysia aff cup performance' => 'Malaysia’s national football team has performed well in the AFF Suzuki Cup, winning the tournament in 2010 and reaching the final on other occasions.',
    'malaysia world cup qualification chances' => 'Malaysia has yet to qualify for the FIFA World Cup, but it remains a competitive force in the Asian region.',
    'aff suzuki cup malaysia record' => 'Malaysia won the AFF Suzuki Cup in 2010 and was a finalist in 1996, 2000, and 2014.',

    'selangor vs kuala lumpur derby' => 'The Selangor vs Kuala Lumpur derby is one of the most exciting and historic rivalries in Malaysian football.',
    'selangor fc biggest rivalry' => 'Selangor FC’s biggest rival is the Kuala Lumpur FA, and their encounters are always highly anticipated by fans.',
    'malaysia top football rivalries' => 'The top football rivalries in Malaysia include the Selangor-Kuala Lumpur derby, the JDT-Pahang FA rivalry, and the Kelantan-Trengganu rivalry.',
        ];

        // Get the user's input message
        $message = strtolower($request->input('message')); // Convert message to lowercase for easier matching

        // Check if the message is a greeting
        if (in_array($message, ['hai', 'hello', 'hi', 'hey'])) {
            return response()->json(['reply' => 'Hello! How can I help you today? Ask about football teams or events!']);
        }

        // Set a default reply if no matches are found
        $reply = 'Sorry, I don’t understand your question. Try asking about football topics like "players", "world cup", "penalty kick", etc.';

        // Normalize the input message to handle plural/singular cases
        $normalizedMessage = $this->normalizeWord($message);

        // Check for the keyword in the user's message
        $foundKeyword = false;
        foreach ($footballKeywords as $keyword => $answer) {
            // Normalize the keyword for better matching
            $normalizedKeyword = $this->normalizeWord(strtolower($keyword));

            // First, check for an exact match (with or without spaces)
            if (strpos($normalizedMessage, $normalizedKeyword) !== false) {
                $reply = $answer;
                $foundKeyword = true;
                break;
            }

            // Fuzzy matching using Levenshtein distance (to allow for minor misspellings)
            $distance = $this->calculateLevenshtein($normalizedMessage, $normalizedKeyword);

            // If distance is within a threshold, consider it a match
            if ($distance <= 3) {
                $reply = $answer;
                $foundKeyword = true;
                break;
            }
        }

        // If no keyword is found, provide a default response
        if (!$foundKeyword) {
            $reply = 'Sorry, I couldn’t find information related to your question. Please try asking about football topics like "players", "world cup", or "penalty kick".';
        }

        // Return the response
        return response()->json(['reply' => $reply]);
    }
}
