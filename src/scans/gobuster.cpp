#include<iostream>
#include<string>
#include "../headers/exec.h"

int gobuster(const std::string& type, const std::string& target, const std::string& args) {
  std::string scan = "gobuster ";
  std::string wordListPath = "-w ../resources/wordlists/directory-list-2.3-small.txt";
  std::string cmd = scan + args + type + target + wordListPath;
  std::string result = exec(cmd.c_str());

  std::cout << "Scan result: \n" << result << std::endl;

  return 0;
}

int main(int argc, char* argv[]) {
  if(argc != 3) {
    std::cerr << "Run " << argv[0] << " <SCAN TYPE>" << " <ARGS>" << std::endl;

    return 1;
  }

  std::string type = argv[1];
  std::string target = argv[2];
  std::string args = argv[3];

  gobuster(type, target, args);

  return 0;
}
