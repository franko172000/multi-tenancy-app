RED=$(tput setaf 1)
RESET=$(tput sgr0)
GREEN=$(tput setaf 2)
BLUE=$(tput setaf 4)
BOLD=$(tput bold)
TAB="  "

function error()
{
	echo -e "${RED}ERROR: ${1}${RESET}"
	exit 1
}

function success()
{
	echo -e "${GREEN}${1}${RESET}"
}

function info()
{
	echo -e "${BLUE}${1}${RESET}"
}

function process_info()
{
    echo -e "${BOLD}⠿⠿⠿⠿ ${1}${RESET}"
}
