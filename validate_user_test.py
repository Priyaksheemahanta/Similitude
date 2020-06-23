#!/usr/bin/env python
import unittest

from validate_user import validate_user

class TestValidateUser(unittest.Testcase):
    def test_valid(self):
        self.assertEqual(validate_user('validuser', 3)
