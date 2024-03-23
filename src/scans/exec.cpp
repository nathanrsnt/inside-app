#include "../headers/exec.h"
#include<iostream>
#include<string>
#include<cstdlib>
#include<memory>
#include<cstdio>
#include<stdexcept>
#include<array>

std::string exec(const char* cmd) {
  std::array<char, 128> buffer;
  std::string result;

  std::unique_ptr<FILE, decltype(&pclose)> pipe (popen(cmd, "r"), pclose);
  if (!pipe) {
    throw std::runtime_error("exec failed!");
  }
  while (fgets(buffer.data(), buffer.size(), pipe.get()) != nullptr) {
    result += buffer.data();
  }

  return result;
}
