#include<iostream>
#include<string>
#include "exec.h"

int gobuster(const std::string& type, const std::string& dns, const std::string& args) {
  
}

int main(int argc, char* argv[]) {
  if(argc != 3) {
    std::cerr << "Run " << argv[0] << " <SCAN TYPE>" << " <ARGS>" << std::endl;

    return 1;
  }

  std::string type = argv[1];
  std::string dns = argv[2];
  std::string args = argv[3];

  gobuster(type, dns, args);

  return 0;
}
